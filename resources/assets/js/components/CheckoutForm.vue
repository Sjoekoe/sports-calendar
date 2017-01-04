<template>
    <form action="/purchases" method="POST">

        <input type="hidden" name="stripeToken" v-model="stripeToken">
        <input type="hidden" name="stripeEmail" v-model="stripeEmail">

        <button type="submit" @click.prevent="buy">Checkout</button>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                stripeEmail: '',
                stripeToken: ''
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

                    this.$http.post('/purchases', this.$data)
                        .then(response => alert('Complete. thanks for your payment.'));
                }
            });
        },

        methods: {
            buy() {
                this.stripe.open({
                    name: 'My Book',
                    description: 'Some description about my book',
                    amount: 2500
                });
            }
        }
    }

</script>
