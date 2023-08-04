<template>

    <p>Hola Mundo</p>
    <button @click="health">Health</button>
</template>
<script>
import { defineComponent } from 'vue';


export default defineComponent({
    setup() {

        function health() {
            fetch("http://localhost:8000/api/fake",{
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                }
            }).then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.log(error);
                })
        }

        return {
            health
        }
    }
});
</script>