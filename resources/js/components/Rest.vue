<template>
    <div class="container-fluid">
        <div class="container ">
            <div class="row risto_image " :style="getRestauImg()"></div>
            <div class="row m-1 p-3">
                <div class="col-md-6 piatti mb-3">
                    <h3 class="text-uppercase text-black">
                        {{ restaurant.name }} menu:
                    </h3>
                    <div
                        v-for="dish in restaurant.dishes"
                        :key="dish.id"
                        class="row shadow rounded p-4"
                    >
                        <div class="col-md-6">
                            <h4 class="text-uppercase">{{ dish.dish_name }}</h4>
                            <p>{{ dish.dish_price }}€</p>
                            <button
                                class="btn btn-primary"
                                @click="addToCart(dish)"
                            >
                                Aggiungi al carrello
                            </button>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="dish_image "
                                :style="getDishImg(dish)"
                            ></div>
                        </div>
                    </div>
                </div>
                <!-- offset-md-1 col-md-5 -->
                <div class="offset-md-1 col-md-5">
                    <h2 class="ml-2 mb-3">
                        <span class="text-primary"
                            ><i class="fas fa-shopping-cart"></i
                        ></span>
                        Il tuo carrello
                    </h2>
                    <div v-if="carrello.length > 0" class="shadow rounded pb-3">
                        <div
                            v-for="dish in carrello"
                            :key="dish.id"
                            class="d-flex justify-content-between align-items-center p-3"
                        >
                            <span class="d-inline-block w-25">{{
                                dish.name
                            }}</span>
                            <div
                                class="d-flex align-items-center border border-primary rounded"
                            >
                                <span
                                    class="qty bg-primary"
                                    @click="increase(dish)"
                                >
                                    <i
                                        class="fa fa-plus"
                                        aria-hidden="true"
                                    ></i>
                                </span>
                                <span
                                    class="d-inline-block mx-2 font-weight-bold"
                                >
                                    {{ dish.qty }}
                                </span>
                                <span
                                    class="qty bg-primary"
                                    @click="reduce(dish)"
                                >
                                    <i
                                        class="fa fa-minus"
                                        aria-hidden="true"
                                    ></i>
                                </span>
                            </div>
                            <span class="d-inline-block w-25 text-right"
                                >{{ dish.qty * dish.price }}€</span
                            >
                        </div>
                        <div class="text-center">
                            <h3 class="pt-3 border-top">
                                Totale:
                                <span class="font-weight-bold"
                                    >{{ getTotal() }}€</span
                                >
                            </h3>
                            <a
                                v-if="carrello.length > 0"
                                :href="route"
                                class="btn btn-lg btn-success text-uppercase"
                            >
                                vai al checkout
                            </a>
                        </div>
                    </div>
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

            const storedCart = JSON.parse(localStorage.getItem("carrello"));
            const cartBdg = document.getElementById("cart_bdg");
            const cartBtn = document.getElementById("cart_btn");

            if (!cartBtn.classList.contains("text-success")) {
                cartBtn.classList.add("text-success");
            }
            if (cartBdg.classList.contains("d-none")) {
                cartBdg.classList.remove("d-none");
            }
            let quantities = 0;

            storedCart.forEach(element => {
                quantities += element.qty;
            });
            cartBdg.innerText = quantities;

            // cart btn
            if (!cartBtn.classList.contains("text-success")) {
                cartBtn.classList.add("text-success");
            }
        },
        increase(dish) {
            dish.qty++;
            localStorage.setItem("carrello", JSON.stringify(this.carrello));
            const storedCart = JSON.parse(localStorage.getItem("carrello"));
            const cartBdg = document.getElementById("cart_bdg");

            let quantities = 0;

            storedCart.forEach(element => {
                quantities = element.qty;
            });
            cartBdg.innerText = quantities;
        },
        reduce(dish) {
            if (dish.qty > 1) {
                dish.qty--;
                localStorage.setItem("carrello", JSON.stringify(this.carrello));

                const storedCart = JSON.parse(localStorage.getItem("carrello"));
                const cartBdg = document.getElementById("cart_bdg");

                let quantities = 0;

                storedCart.forEach(element => {
                    quantities = element.qty;
                });
                cartBdg.innerText = quantities;
            } else {
                this.carrello.splice(this.carrello.indexOf(dish), 1);
                localStorage.setItem("carrello", JSON.stringify(this.carrello));
                //cartbtn
                const cartBtn = document.getElementById("cart_btn");
                const cartBdg = document.getElementById("cart_bdg");
                let cart = JSON.parse(localStorage.getItem("carrello"));
                if (cart.length == 0) {
                    if (cartBtn.classList.contains("text-success")) {
                        cartBtn.classList.remove("text-success");
                    }
                    if (!cartBdg.classList.contains("d-none")) {
                        cartBdg.classList.add("d-none");
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
            if (this.restaurant.cover.indexOf("cover") >= 0) {
                return `background-image: url(/storage/${this.restaurant.cover})`;
            } else {
                return `background-image: url(${this.restaurant.cover})`;
            }
        },
        /* sisemare la unz per img del piatto */
        getDishImg(dish) {
            if (dish.dish_image.indexOf("dishes") >= 0) {
                return `background-image: url(/storage/${dish.dish_image})`;
            } else {
                return `background-image: url(${dish.dish_image})`;
            }
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
    height: 40vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
}
.dish_image {
    background-size: contain;
    background-repeat: no-repeat;
    min-height: 100px;
}
.btn_rounded {
    padding: 0 0.3rem;
    border-radius: 100%;
    background: transparent;
    color: #00ccbc;
    border: 1px solid #00ccbc;
    &:hover {
        cursor: pointer;
    }
}
span.qty {
    display: grid;
    padding: 0.3rem;
    place-items: center;
    color: #fff;
    cursor: pointer;
}
</style>
