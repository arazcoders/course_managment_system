<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.

                        <button @click="count++">
                            Count is: {{ count }}
                        </button>

                <button  v-on:click="modalDisplay=!modalDisplay" >display</button>

                        <input v-bind:id="Test" :disabled="isDisableInput"/>

                    </div>
                </div>
            </div>
        </div>
    </div>



</template>

<script>


import axios from "axios";
    export default {

        components: {  },

        mounted() {
            axios.get("https://jsonplaceholder.typicode.com/users")
                .then(response=> console.log(response)).catch(err=>console.log(err));
            console.log('Component mounted.')
        },

        data(){
            return {

                count: 0,
                Test:'Test',
                isDisableInput:false,
                modalDisplay:true

            }
        },
        methods:{

            toggleDisplay(modalDisplay){

                modalDisplay = !modalDisplay;

                console.log(modalDisplay);

                return modalDisplay;

            }


        }
    }

</script>
