<template>
    <div class="container-fluid">
        <div class="container ">
            <div class="row risto_image " :style="getRestauImg()"></div>
            <div class="row py-3">
                <div class="col-md-6 piatti">
                    <h3 class="text-uppercase text-black">
                        {{ restaurant.name }}
                    </h3>
                    <div
                        v-for="dish in restaurant.dishes"
                        :key="dish.id"
                        class="row shadow rounded m-3 p-4"
                    >
                        <div class="col-md-6">
                            <h4 class="text-uppercase">{{ dish.dish_name }}</h4>
                            <p>{{ dish.dish_price }}€</p>
                            <button @click="addToCart(dish)">
                                Aggiungi al carrello
                            </button>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="dish_image"
                                :style="getDishImg(dish)"
                            ></div>
                        </div>
                    </div>
                </div>
                <div v-if="carrello.length > 0" class="col-md-6 text-center">
                    <h3>Carrello</h3>
                    <div v-for="dish in carrello" :key="dish.id">
                        <p class="text-uppercase">
                            <strong>{{ dish.name }}</strong>
                        </p>
                        <button @click="dish.qty++">
                            <i class="fas fa-plus"></i>
                        </button>
                        <p class="mt-3">{{ dish.qty }}</p>
                        <button @click="reduce(dish)">
                            <i class="fas fa-minus"></i>
                        </button>
                        <p>{{ dish.qty * dish.price }}€</p>
                    </div>
                    <h2>Totale: {{ getTotal() }}€</h2>
                    <!-- attesa route -->
                    <a
                        v-if="carrello.length > 0"
                        :href="route"
                        class="btn btn-lg btn-success text-uppercase"
                    >
                        vai al checkout
                    </a>
                    <!-- /attesa route -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["rest", "route"],
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
        reduce(dish) {
            if (dish.qty > 1) {
                dish.qty--;
            } else {
                this.carrello.splice(this.carrello.indexOf(dish), 1);
                localStorage.setItem("carrello", JSON.stringify(this.carrello));
                //cartbtn
                const cartBtn = document.getElementById("cart_btn");
                let cart = JSON.parse(localStorage.getItem("carrello"));
                if (cart.length == 0) {
                    if (cartBtn.classList.contains("text-success")) {
                        cartBtn.classList.remove("text-success");
                    }
                }
            }
        },
        getTotal() {
            let total = 0;
            this.carrello.forEach(item => {
                total += item.qty * item.price;
            });
            return total;
        },
        getRestauImg() {
            return `background-image: url(${this.restaurant.cover})`;
        },
        /* sisemare la unz per img del piatto */
        getDishImg(dish) {
            return `background-image: url(${dish.dish_image})`;
        }
        /* sisemare la unz per img del piatto */
    },
    mounted() {
        if (localStorage.carrello) {
            this.carrello = JSON.parse(localStorage.getItem("carrello"));
        }
    }
};
</script>

<style lang="scss" scoped>
.risto_image {
    height: 33vh;
    background-repeat: no-repeat;
    background-size: cover;
}
.dish_image {
    background-size: contain;
    background-repeat: no-repeat;
    max-height: 100px;
}
</style>
