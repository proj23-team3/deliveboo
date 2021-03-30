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
                                <h2 class="grid-title mt-4 font-weight-bolder">
                                    Categorie
                                </h2>
                                <hr />

                                <!-- BEGIN FILTER BY CATEGORY -->
                                <div
                                    class="card_container categories_checkboxes"
                                >
                                    <label
                                        class="b-contain mr-3"
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        <span :for="category.id">{{
                                            category.name
                                        }}</span>
                                        <input
                                            type="checkbox"
                                            :id="category.id"
                                            :value="category.id"
                                            v-model="checked"
                                        />
                                        <div class="b-input"></div>
                                    </label>
                                </div>
                                <!-- END FILTER BY CATEGORY -->
                            </div>
                            <!-- END FILTERS -->
                            <!-- BEGIN RESULT -->
                            <div class="col-md-9 results">
                                <h2 class="mt-4 font-weight-bolder">
                                    Risultati
                                </h2>
                                <hr />
                                <!-- BEGIN SEARCH INPUT -->
                                <form
                                    class="input-group"
                                    @submit.prevent="restaurantFunc"
                                >
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="search"
                                    />
                                    <span class="input-group-btn">
                                        <button
                                            class="btn btn-primary"
                                            type="button"
                                            @click="restaurantFunc"
                                        >
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </form>
                                <!-- END SEARCH INPUT -->
                                <p class="mt-2">
                                    Ecco i risultati relativi alla tua ricerca
                                </p>

                                <div class="padding"></div>

                                <!-- BEGIN TABLE RESULT -->
                                <div class="table-responsive">
                                    <table class="table table-striped t_hover">
                                        <tbody>
                                            <tr
                                                v-for="rest in filteredRests"
                                                :key="rest.id"
                                            >
                                                <td class="image">
                                                    <img
                                                        class="img-fluid"
                                                        :src="
                                                            getRestImg(
                                                                rest.cover
                                                            )
                                                        "
                                                        alt=""
                                                    />
                                                </td>

                                                <td
                                                    class="product text-right d-flex flex-column justify-content-around"
                                                >
                                                    <h2
                                                        class="font-weight-bolder"
                                                    >
                                                        {{ rest.name }}
                                                    </h2>
                                                    <h5>{{ rest.address }}</h5>
                                                    <p>
                                                        <i
                                                            class="fa fa-star purple"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star purple"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star purple"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star purple"
                                                        ></i>
                                                    </p>
                                                    <a
                                                        class="btn btn-primary"
                                                        :href="
                                                            `restaurant/${rest.id}`
                                                        "
                                                        >Vai al ristorante</a
                                                    >
                                                </td>
                                            </tr>
                                            <!-- Restaurant list based on searched
                                            function -->
                                            <tr
                                                v-for="searched in searchedRestaurant"
                                                :key="searched.id"
                                            >
                                                <td class="image">
                                                    <img
                                                        class="img-fluid"
                                                        :src="
                                                            getRestImg(
                                                                searched.cover
                                                            )
                                                        "
                                                        alt=""
                                                    />
                                                </td>

                                                <td
                                                    class="product text-right d-flex flex-column justify-content-around"
                                                >
                                                    <h2
                                                        class="font-weight-bolder"
                                                    >
                                                        {{ searched.name }}
                                                    </h2>
                                                    <h5>
                                                        {{ searched.address }}
                                                    </h5>
                                                    <p>
                                                        <i
                                                            class="fa fa-star purple"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star purple"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star purple"
                                                        ></i
                                                        ><i
                                                            class="fa fa-star purple"
                                                        ></i>
                                                    </p>
                                                    <a
                                                        class="btn btn-primary"
                                                        :href="
                                                            `restaurant/${searched.id}`
                                                        "
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
            search: "",
            searchedRestaurant: [],
            categories: [],
            checked: [],
            restaurants: []
        };
    },
    methods: {
        // getRoute(id) {
        //     let route = `/restaurant/${id}`;
        //     return route;
        // }
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
    },
    methods: {
        restaurantFunc: function() {
            axios
                .get(`../api/users?name=${this.search}`)
                .then(response => {
                    console.log(response);
                    this.searchedRestaurant = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        getRestImg(img_path) {
            console.log(img_path);
            if (img_path.indexOf("cover") >= 0) {
                return `/storage/${img_path}`;
            } else {
                return `${img_path}`;
            }
        }
    }
};
</script>
