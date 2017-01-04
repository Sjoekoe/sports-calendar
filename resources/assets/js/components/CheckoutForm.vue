<template>
    <form action="/purchases" method="POST">

        <input type="hidden" name="stripeToken" v-model="stripeToken">
        <input type="hidden" name="stripeEmail" v-model="stripeEmail">

        <select name="product" v-model="product">
            <option v-for="product in products" :value="product.id">
                {{ product.name }} &mdash; &euro;{{ product.price / 100 }}
            </option>
        </select>

        <button type="submit" @click.prevent="buy">Checkout</button>
    </form>
</template>

<script>
    export default {
        props: ['products'],
        data() {
            return {
                stripeEmail: '',
                stripeToken: '',
                product: 1
            }
        },

        created() {
            this.stripe = StripeCheckout.configure({
                key: window.scheduler.services.stripe,
                image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                locale: "auto",
                token: (token) => {
                    this.stripeToken = token.id;
                    this.stripeEmail = token.email;

                    this.$http.post('/purchases/' + this.product, this.$data)
                        .then(response => alert('Complete. thanks for your payment.'));
                }
            });
        },

        methods: {
            buy() {
                let product = this.findProductById(this.product);
                this.stripe.open({
                    name: product.name,
                    description: product.description,
                    amount: product.price
                });
            },

            findProductById(id) {
                return this.products.find(product => product.id == id);
            }
        }
    }

</script>
