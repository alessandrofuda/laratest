<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component - Calculator</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="diviso">Conto per persona</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">€</span>
                                <input name="diviso" class="form-control text-right" type="number" disabled><!--v-model="diviso"-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="totale">Conto totale</label>
                            <div class="input-group">
                                <span class="input-group-addon">€</span>
                                <input name="totale" class="form-control text-right" type="number" min="0" step="0.01"><!--v-model="totale"-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="persone">Persone</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">-</button><!--v-on:click="removePersona()"-->
                                </span>
                                <input name="persone" type="number" class="form-control text-center" min="1" step="1" value="1"><!--v-model="persone"-->
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">+</button><!--v-on:click="addPersona()"-->
                                </span>
                            </div>
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
            console.log('Component mounted...')
        } /*,
        data: function() {
            return {
                totale: 100,
                persone: 1
            }
        },
        computed: {
            diviso: function () {
                return this.totale / this.persone;
            }
        },
        methods: {
            addPersona: function(){
                return this.persone = this.persone + 1;
            },
            removePersona: function(){
                if( this.persone > 1 )
                    return this.persone = this.persone - 1;
            }
        }
        */

    }
</script>
