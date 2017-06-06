<template>
    <form action="/subscriptions" method="POST">

        <input type="hidden" name="stripeToken" v-model="stripeToken">
        <input type="hidden" name="stripeEmail" v-model="stripeEmail">

        <select name="plan" v-model="plan">
            <option v-for="plan in plans" :value="plan.id">
                {{ plan.name }} &mdash; &euro;{{ plan.price / 100 }}
            </option>
        </select>

        <button type="submit" @click.prevent="subscribe">Subscribe</button>

        <p class="text-danger" v-show="status" v-text="status"></p>
    </form>
</template>

<script>
    export default {
        props: ['plans'],

        data() {
            return {
                stripeEmail: '',
                stripeToken: '',
                plan: 1,
                status: false
            }
        },

        created() {
            this.stripe = StripeCheckout.configure({
                key: window.scheduler.services.stripe,
                image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                locale: "auto",
                panelLabel: 'Subscribe for',
                token: (token) => {
                    this.stripeToken = token.id;
                    this.stripeEmail = token.email;

                    this.$http.post('/subscriptions/' + this.plan, this.$data)
                        .then(
                            response => alert('Complete. thanks for your payment.'),
                            response => this.status = response.body.status
                        );
                }
            });
        },

        methods: {
            subscribe() {
                let plan = this.findPlanById(this.plan);

                this.stripe.open({
                    name: plan.name,
                    description: plan.name,
                    amount: plan.price
                });
            },

            findPlanById(id) {
                return this.plans.find(plan => plan.id == id);
            }
        }
    }

</script>
