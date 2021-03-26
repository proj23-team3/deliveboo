<template>
    <div v-if="carrello.length > 0" class="card p-1">
        <div class="content">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="items">
                        <div    class="product"
                                v-for="dish in carrello"
                                :key="dish.id"
                                >
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="info">
                                        <div class="row">
                                            <div class="col-md-5 product-name">
                                                <div class="product-name">
                                                    <label for="name">Nome:</label>
                                                    <div class="product-info">
                                                        <label class="text-uppercase"><span class="value">{{ dish.name }}</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 quantity">
                                                <label for="quantity">Quantità:</label>
                                                <label class="card text-center d-flex" for="quantity">
                                                    <span class="btn_rounded" @click="reduce(dish)">
                                                        <i class="fas fa-minus"></i>
                                                    </span>
                                                    <span> {{ dish.qty }}</span>
                                                     <span class="btn_rounded" @click="increase(dish)">
                                                        <i class="fas fa-plus"></i>
                                                    </span>
                                                    </label>

                                            </div>
                                            <div class="col-md-3 price">
                                                <label for="price">Prezzo:</label>
                                                <span>{{ dish.qty * dish.price }} €</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="summary">
                        <h3>Summary</h3>
                        <div class="summary-item"><span class="text">Subtotal</span><span class="price">€360</span></div>
                        <div class="summary-item"><span class="text">Discount</span><span class="price">€0</span></div>
                        <div class="summary-item"><span class="text">Shipping</span><span class="price">€0</span></div>
                        <div class="summary-item"><span class="text">Total</span><span class="price"> {{ getTotal() }} €</h2></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            carrello: []
        };
    },
    methods: {
        addTocarrello(dish) {
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

            // carrello btn
            const carrelloBtn = document.getElementById("carrello_btn");
            if (!carrelloBtn.classList.contains("text-success")) {
                carrelloBtn.classList.add("text-success");
            }
        },
        increase(dish) {
            dish.qty++;
            localStorage.setItem("carrello", JSON.stringify(this.carrello));
        },
        reduce(dish) {
            if (dish.qty > 1) {
                dish.qty--;
            } else {
                this.carrello.splice(this.carrello.indexOf(dish), 1);
                localStorage.setItem("carrello", JSON.stringify(this.carrello));
                //carrellobtn
                const carrelloBtn = document.getElementById("carrello_btn");
                let carrello = JSON.parse(localStorage.getItem("carrello"));
                if (carrello.length == 0) {
                    if (carrelloBtn.classList.contains("text-success")) {
                        carrelloBtn.classList.remove("text-success");
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
.dish_image {
    background-size: contain;
    background-repeat: no-repeat;
    min-height: 100px;
}
.btn_rounded {
    font-size: 0.7rem;
    padding: 0.3rem;
    background: transparent;
    &:hover {
        cursor: pointer;
    }
}
.quantity{
    .card{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
}
</style>
