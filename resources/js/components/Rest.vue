<template>
    <div class="container">
        <h2>Ciao</h2>
        <h3>{{ restaurant.name }}</h3>
        <div class="d-flex">
            <div class="piatti">
                <div
                    v-for="dish in restaurant.dishes"
                    :key="dish.id"
                    class="shadow rounded m-3 w-50 p-4"
                >
                    <h4>{{ dish.dish_name }}</h4>
                    <p>{{ dish.dish_price }}€</p>
                    <button @click="addToCart(dish)">
                        Aggiungi al carrello
                    </button>
                </div>
            </div>
            <div v-if="carrello.length > 0">
                <h3>Carrello</h3>
                <div v-for="dish in carrello" :key="dish.id">
                    <p>{{ dish.name }}</p>
                    <button @click="dish.qty++">Aumenta</button>
                    <p>{{ dish.qty }}</p>
                    <button @click="dish.qty--">Diminuisci</button>
                    <p>{{ dish.qty * dish.price }}€</p>
                </div>
                <h2>Totale: {{ getTotal() }}€</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["rest"],
    data() {
        return {
            restaurant: this.$props.rest[0],
            carrello: []
        };
    },
    methods: {
        addToCart(dish) {
            let newItem = {
                risto_id: dish.user_id,
                id: dish.id,
                name: dish.dish_name,
                price: dish.dish_price,
                qty: 1
            };
            if (this.carrello.length == 0) {
                this.carrello.push(newItem);
            } else {
                // non si può aggiungere piatti da più ristoranti
                let rist_id = [
                    ...new Set(this.carrello.map(dish => dish.risto_id)) // metto tutti gli id risto dei piatti in un arr e rimuovo i duplicati... ne avrò quindi sempre uno, quello del primo piatto che finisce nel carrello
                ];
                rist_id = rist_id[0]; // ricavo il number dell'id risto

                let ids = this.carrello.map(dish => dish.id);
                if (ids.includes(newItem.id)) {
                    this.carrello.forEach(element => {
                        if (element.id == newItem.id) {
                            element.qty++;
                        }
                    });
                } else {
                    newItem.risto_id == rist_id
                        ? this.carrello.push(newItem)
                        : alert(
                              "Non puoi aggiungere piatti da un altro ristorante"
                          );
                }
            }

            // store del carrello
            localStorage.setItem("carrello", JSON.stringify(this.carrello));

            // cart btn
            const cartBtn = document.getElementById("cart_btn");
            if (!cartBtn.classList.contains("text-success")) {
                cartBtn.classList.add("text-success");
            }
        },
        getTotal() {
            let total = 0;
            this.carrello.forEach(item => {
                total += item.qty * item.price;
            });
            return total;
        }
    },
    mounted() {
        if (localStorage.carrello) {
            this.carrello = JSON.parse(localStorage.getItem("carrello"));
        }
    }
};
</script>

<style></style>
