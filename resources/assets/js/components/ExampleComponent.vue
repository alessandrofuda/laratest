<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header text-center">
                        <span class="">Vuejs Component Example</span>
                        <span class="tit">Real Time Calculator</span>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="diviso">Euro a persona</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">€</span>
                                <input v-model="diviso" name="diviso" class="form-control text-left diviso" disabled><!-- type="number" -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="totale">Conto totale</label>
                            <div class="input-group">
                                <span class="input-group-addon">€</span>
                                <input v-model="totale" name="totale" class="form-control text-center" type="number" min="0" step="0.01" style="padding-left: 5%;"><!--  -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="persone">Quante persone?</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button v-on:click="removePersona()" class="btn btn-secondary left" type="button">-</button><!--  -->
                                </span>
                                <input v-model="persone" name="persone" class="form-control text-center" min="1" step="1" disabled><!-- value="1" type="number" -->
                                <span class="input-group-btn">
                                    <button v-on:click="addPersona()" class="btn btn-secondary right" type="button">+</button><!--  -->
                                </span>
                            </div>
                        </div>
                        <div class="reset text-right">
                            <button v-on:click.prevent="resetForm()" type="button" class="btn btn-outline-secondary">RESET</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted: function() { 
            console.log('Component mounted..')
        },
        data: function() {
            return {
                totale: (100.01).toFixed(2), 
                persone: 1
            }
        },
        computed: {
            diviso: function() {
                // return Number(( this.totale / this.persone ).toFixed(2)); // round to 2 decimal
                return ( this.totale / this.persone ).toFixed(2); // round to 2 decimal
            }
        },
        methods: {
            addPersona: function(){
                return this.persone = this.persone + 1;
            },
            removePersona: function(){
                if( this.persone > 1 )
                    return this.persone = this.persone - 1;
            },
            resetForm: function(){
                
                this.totale = 0,
                this.persone = 2
            }
        }
    }
</script>
