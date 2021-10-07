<template>
    <div class="market-content">
        
        <div class="market-header">
            <h1>Market</h1>
        </div>

        <div class="market-products">
            <div class="market-products-filters">
                <div class="market-type-filter">
                    <h3>What are you looking for?</h3>
                    <div class="market-category-filter">
                        <div>
                            <input type="radio" name="category-filter" value="all-products" v-model="filter">
                            <label>All products</label>
                        </div>

                        <div>
                            <input type="radio" name="category-filter" value="PC" v-model="filter">
                            <label>PC</label>
                        </div>

                        <div>
                            <input type="radio" name="category-filter" value="peripherals" v-model="filter">
                            <label>Peripherals</label>
                        </div>

                        <div>
                            <input type="radio" name="category-filter" value="smartphone" v-model="filter">
                            <label>Smartphone</label>
                        </div>
                    </div>
                </div>

                <div v-if="prices.lowest === prices.highest" class="market-price-filter">
                    <h3> Price? </h3>
                    <div>
                        <input type="radio" name="category-price" checked v-on:click="PriceFilter('all-prices')">
                        <label>All products</label>
                    </div>
                    <div>
                        <input type="radio" name="category-price" v-on:click="PriceFilter( prices.highest )">
                        <label>Up to {{ prices.highest }}</label>
                    </div>
                </div>

                <div v-else class="market-price-filter">
                    <h3> Price? </h3>
                    <div>
                        <input type="radio" name="category-price" checked v-on:click="PriceFilter('all-prices')">
                        <label>All products</label>
                    </div>
                    <div>
                        <input type="radio" name="category-price" v-on:click="PriceFilter( prices.lowest )">
                        <label>Up to {{ prices.lowest }}</label>
                    </div>
                    <div>
                        <input type="radio" name="category-price" v-on:click="PriceFilter( prices.highest )">
                        <label>Up to {{ prices.highest }}</label>
                    </div>
                </div>
            </div>

            <div class="products">
                <div class="market-products-message">
                    <h2> You're seeing: {{ filter }} </h2>
                </div>

                <div class="product" v-for="product in products" v-bind:key="product.id">
                    <p> Name: {{ product.name }}, Price: {{ product.price }}, Category: {{ product.category }}  </p>
                </div>
            </div>
            
        </div>

    </div>
</template>

<script>
    export default {
        name: 'Market',
        data() {
            return {
                filter: "test",
                products: [],
                allproducts: [],
                filter: "all-products",
                prices: {
                    lowest: 0,
                    highest: 0,
                }
            }
        },
        watch: {
            filter: function() {
                if ( this.filter === 'all-products' ) {
                    this.products = this.allproducts
                }
                else {
                    this.products = this.allproducts.filter(category => {
                        return category ? category.category === this.filter : console.log("ok ok ok")
                    })
                }
            },
            products: function () {
                this.SetfilterValue()
            }
        },
        created() {
            this.getProducts()
        },
        methods: {
            async getProducts() {
                const options = {
                    method: 'GET',
                    mode: 'cors',
                    cache: 'default'
                }

                const requisition = await fetch ( "http://127.0.0.1:8000/api/products", options )  
                const response = await requisition.json()

                if (response.status) {
                    this.allproducts = response.products
                    this.products = this.allproducts
            
                    this.SetfilterValue()
                }
            },
            SetfilterValue() {
                let price = []
                for ( let index in this.products ) {
                    price.push( Number(this.products[index].price) )
                }

                let lowest = price.map(Number).reduce(function(a, b) {
                    return Math.min(a, b);
                }); 

                let highest = price.map(Number).reduce(function(a, b) {
                    return Math.max(a, b);
                }); 

                this.prices.lowest = lowest
                this.prices.highest = highest
            },
            PriceFilter( PriceValue ) {
                if( PriceValue === "all-prices" ){
                    if ( this.filter === "all-products" ){
                        this.products = this.allproducts
                    }
                    else {
                        this.products = this.allproducts.filter( product => {
                            return product ? product.category === this.filter : console.log("ok ok ok")
                        })
                    }

                }
                else {
                    this.products = this.products.filter( product => {
                        return product ? product.price <= PriceValue : console.log("ok ok ok")
                    })
                }
            }
        }
    }
</script>

<style>

</style>