<template>
    <div class="market-content">
        
        <div class="market-header">
            <h1>Market</h1>
        </div>

        <div class="market-products">
            <div class="market-products-filters">
                <div class="market-type-filter">
                    <h3>What are you looking for?</h3>
                    <select>
                        <option>All products</option>
                        <option>PC</option>
                        <option>Peripherals</option>
                        <option>Smartphone</option>
                    </select>
                </div>

                <div class="market-price-filter">
                    <h3> Price? </h3>
                    <select>
                        <option>All prices</option>
                        <option>Up to R${{ prices.lowest }}</option>
                        <option>Up to R${{ prices.highest }}</option>
                    </select>
                </div>
            </div>

            <div class="market-products-message">
                <h2> You're seeing: {{ filter }} </h2>
            </div>
                <div class="products">
                    <div class="product" v-for="product in products" v-bind:key="product.id">
                        <p> Name: {{ product.name }}, Price: {{ product.price }}  </p>
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
                prices: {
                    lowest: 0,
                    highest: 0,
                }
            }
        },
        async created() {
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
            
                this.SetfilterValue( this.products )
            }
        },
        methods: {
            SetfilterValue( products ) {
                let price = []
                for ( let index in products ) {
                    price.push( Number(products[index].price) )
                }

                let lowest = price.map(Number).reduce(function(a, b) {
                    return Math.min(a, b);
                }); 

                let highest = price.map(Number).reduce(function(a, b) {
                    return Math.max(a, b);
                }); 

                this.prices.lowest = lowest
                this.prices.highest = highest
            }
        }
    }
</script>

<style>

</style>