<script>
import axios from 'axios'
import { StripeCheckout } from '@vue-stripe/vue-stripe';
import FooterView from './FooterView.vue'



export default {
    components: {
        StripeCheckout,
         FooterView 
    },
    data() {
        this.publishableKey = 'pk_test_51NT3WIEdQLrUXy7B9EdDA2hylQaAO9BvevgkjlhXScI5bvdZmNflrcfh0qaQNqBt1LUM2M7G7wqG5RJUYyAzfRWL00KeK4FPRW';

        return {
            panierSave: [],
            panierActuel: [],

            produits: [],
            totalPrix: 0,


            //stripe id product
            priceId: {
                "1": {
                    price: 'price_1OMg4HEdQLrUXy7Bnb9qE7UK', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "2": {
                    price: 'price_1OMg5DEdQLrUXy7BI6XurtWV', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "3": {
                    price: 'price_1OMg5oEdQLrUXy7B5kERLhNy', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "4": {
                    price: 'price_1OMg8cEdQLrUXy7BWULcdsJs', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "5": {
                    price: 'price_1OMgg6EdQLrUXy7BSK5lZOv7', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "6": {
                    price: 'price_1OMghQEdQLrUXy7BarvoXpDa', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "7": {
                    price: 'price_1OMgi3EdQLrUXy7B9qwZYvrG', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "8": {
                    price: 'price_1OMgiuEdQLrUXy7BwIav3rDy', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
                "9": {
                    price: 'price_1OMgjeEdQLrUXy7BgYpd1ynj', // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
            }
            ,
            //stripe
            loading: false,
            lineItems: [],
            successURL: `http://localhost:${window.location.port}/payementreussi`,
            cancelURL: `http://localhost:${window.location.port}/error`,

        }
    }
    
    
    ,
    mounted(){
        // get product id save

        this.panierSave = sessionStorage.getItem('panier').split(',')
        

        this.panierSave.forEach(element => {
            // mettre product  id save dans le panier du view panier et
            this.panierActuel.push(parseInt(element))
        });
        // init en set pour pas avoir de doublon
        this.panierActuel = [...new Set(this.panierActuel)]
        console.log(this.panierActuel)

        // session variable pour la db produit acheter
        sessionStorage.setItem('produitsAcheter',this.panierActuel)
        console.log(sessionStorage.getItem('produitsAcheter'))

        
    
        console.log("panier"+this.panierActuel)

        // fetch tout les products id dans la base de donner et mettre dans la variable produits pour ensuite les affichers
        if (this.panierActuel[0] != '') {
            this.panierActuel.forEach(element => {

                axios.get(`http://localhost:4208/Full-Stack-Vue-Project/php-backend/?action=produit-id${element}`).then((res) => {
                    this.produits.push(res.data)
                    console.log(this.produits)
                    console.log(window.location.hostname)

                    // total de prix
                    this.totalPrix += res.data.prix

                    // remplire lineItems
                    this.lineItems.push(this.priceId[`${res.data.id}`])

                    console.log(this.lineItems)



                });

            })
        }






    }
    ,
    methods: {
       
        // payement stripe
        submit() {
            // You will be redirected to Stripe's secure checkout page
            this.$refs.checkoutRef.redirectToCheckout();
        },
    }
}

</script>
<template>
    <h1>Panier</h1>
    <div class="panier">
        <div v-for="item in this.produits" :key="item" class="card-produit">
            <div class="column-1">
                <h2>{{ item.type }}</h2>
                <img :src="item.image" :alt="item.type">
                <h4>Prix: {{ item.prix }}</h4>

                <h3>Quantity</h3>
                <input type="text" value=1 readonly>
            </div>
            <div>
                <p>{{ item.description }}</p>

            </div>

        </div>
    </div>
    <div class="stripe-total">
        <h2>Total:{{ totalPrix }}</h2>
        <stripe-checkout ref="checkoutRef" mode="payment" :pk="publishableKey" :line-items="lineItems"
            :success-url="successURL" :cancel-url="cancelURL" @loading="v => loading = v" />
        <button @click="submit">Payer</button>
    </div>
    <FooterView></FooterView>
</template>
<style scoped>
img {
    height: 100px;
    width: 100px;
}

.panier {
    height: auto;
    width: 100vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 100px;
    background-color: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(15px);
}

.card-produit {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    width: 50vw;
    gap: 10px;
}

.column-1 {
    display: flex;
    flex-direction: column;

}

input {
    width: 50px;
}

.stripe-total {
    width: 100vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>