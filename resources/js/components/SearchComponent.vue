<template>
    <div class="container">
        <div class="row">
            <!-- BEGIN SEARCH RESULT -->
            <div class="col-md-12">
                <div class="grid search">
                    <div class="grid-body">
                        <div class="row">
                            <!-- BEGIN FILTERS -->
                            <div class="col-md-3">
                                <h2 class="grid-title">
                                    <i class="fa fa-filter"></i> Filtri
                                </h2>
                                <hr />

                                <!-- BEGIN FILTER BY CATEGORY -->
                                <h4>Categorie</h4>
                                <div class="card_container">
                                    <div
                                        class="checkbox"
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        <input
                                            type="checkbox"
                                            :id="category.id"
                                            :value="category.id"
                                            v-model="checked"
                                        />
                                        <label :for="category.id">{{
                                            category.name
                                        }}</label>
                                    </div>
                                </div>
                                <!-- END FILTER BY CATEGORY -->
                            </div>
                            <!-- END FILTERS -->
                            <!-- BEGIN RESULT -->
                            <div class="col-md-9">
                                <h2><i class="fa fa-file-o"></i> Result</h2>
                                <hr />
                                <!-- BEGIN SEARCH INPUT -->
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="Piatti, ristoranti o tipi di cucina"
                                    />
                                    <span class="input-group-btn">
                                        <button
                                            class="btn btn-primary"
                                            type="button"
                                        >
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- END SEARCH INPUT -->
                                <p>
                                    Ecco i risultati relativi alla tua ricerca
                                </p>

                                <div class="padding"></div>

                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <div class="btn-group">
                                            <button
                                                type="button"
                                                class="btn btn-default active"
                                            >
                                                <i class="fa fa-list"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-default"
                                            >
                                                <i class="fa fa-th"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- BEGIN TABLE RESULT -->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr
                                                v-for="rest in filteredRests"
                                                :key="rest.id"
                                            >
                                                <td class="number text-center">
                                                    1
                                                </td>
                                                <td class="image">
                                                    <img
                                                        :src="rest.cover"
                                                        alt=""
                                                        height="300"
                                                    />
                                                </td>

                                                <td class="product">
                                                    <strong>{{
                                                        rest.name
                                                    }}</strong
                                                    ><br />{{ rest.address }}
                                                </td>
                                                <td class="rate text-right">
                                                    <span
                                                        ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star-half-o"
                                                        ></i
                                                    ></span>
                                                </td>
                                                <td class="price text-right">
                                                    Consegna
                                                    {{ rest.shipping_costs }}
                                                    €
                                                </td>
                                                <td>
                                                    <a href=""
                                                        >Vai al ristorante</a
                                                    >
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END TABLE RESULT -->
                            </div>
                            <!-- END RESULT -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SEARCH RESULT -->
        </div>
    </div>
    <!-- <div class="card_container">
        <div class="checkbox" v-for="category in categories" :key="category.id">
            <input
                type="checkbox"
                :id="category.id"
                :value="category.id"
                v-model="checked"
                :checked="category.id == choose_cat"
            />
            <label :for="category.id">{{ category.name }}</label>
        </div>
    </div> -->
</template>

<script>
export default {
    props: ["choose_cat", "rests"],
    data() {
        return {
            categories: [],
            checked: [],
            restaurants: []
        };
    },
    computed: {
        filteredRests() {
            let filtered = [];
            this.checked.forEach(check => {
                this.restaurants.forEach(rest => {
                    rest.categories.forEach(cat => {
                        if (cat.id === check && !filtered.includes(rest)) {
                            filtered.push(rest);
                        }
                    });
                });
            });
            return filtered;
        }
    },
    created() {
        axios.get("../api/categories").then(response => {
            this.categories = response.data.response;
            this.checked.splice(0, 0, this.$props.choose_cat);
            this.restaurants = this.$props.rests;
        });
    }
};
</script>
