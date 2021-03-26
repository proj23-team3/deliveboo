<template>
    <div v-if="carrello.length > 0" class="text-center shadow">
        <h3 class="text-uppercase text-right">
            <i class="fas fa-shopping-cart"></i> Carrello
        </h3>
        <div class="row card py-4">
            <div
                class="d-flex col-xs-12"
                v-for="dish in carrello"
                :key="dish.id"
            >
                <div>
                    <p class="text-uppercase">{{ dish.name }}</p>
                </div>
                <div>
                    <a class="btn_rounded" @click="reduce(dish)">
                        <i class="fas fa-minus"></i>
                    </a>
                    <span class="px-3">{{ dish.qty }}</span>
                    <a class="btn_rounded" @click="increase(dish)">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
                <div>
                    <p>{{ dish.qty * dish.price }}€</p>
                </div>
            </div>
            <hr />
            <div class="col-xs-12">
                <h2>Totale: {{ getTotal() }}€</h2>
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
                localStorage.setItem("carrello", JSON.stringify(this.carrello));
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
    padding: 0 0.3rem;
    border-radius: 100%;
    background: transparent;
    color: #00ccbc;
    border: 1px solid #00ccbc;
    &:hover {
        cursor: pointer;
    }
}
</style>
