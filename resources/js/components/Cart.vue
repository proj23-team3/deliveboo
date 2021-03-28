<template>
    <div v-if="carrello.length > 0">
        <div
            v-for="dish in carrello"
            :key="dish.id"
            class="d-flex justify-content-between align-items-center p-3"
        >
            <span class="d-inline-block w-25">{{ dish.name }}</span>
            <div
                class="d-flex align-items-center border border-primary rounded"
            >
                <span class="qty bg-primary" @click="increase(dish)">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </span>
                <span class="d-inline-block mx-2 font-weight-bold">
                    {{ dish.qty }}
                </span>
                <span class="qty bg-primary" @click="reduce(dish)">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </span>
            </div>
            <span class="d-inline-block w-25 text-right"
                >{{ dish.qty * dish.price }}€</span
            >
        </div>
        <h3 class="text-right p-3">
            Totale: <span class="font-weight-bold">{{ getTotal() }}€</span>
        </h3>
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
        // pensare a img del piatto nel cart
        getDishImg(dish) {
            if (dish.dish_image.indexOf("dishes") >= 0) {
                return `background-image: url(/storage/${dish.dish_image})`;
            } else {
                return `background-image: url(${dish.dish_image})`;
            }
        }
    },
    mounted() {
        if (localStorage.carrello) {
            this.carrello = JSON.parse(localStorage.getItem("carrello"));
        }
    }
};
</script>

<style lang="scss" scoped>
span.qty {
    display: grid;
    padding: 0.3rem;
    place-items: center;
    color: #fff;
    cursor: pointer;
}
</style>
