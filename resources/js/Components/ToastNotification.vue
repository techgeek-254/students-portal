<script setup>
const toast = useToast()
import { usePage } from '@inertiajs/vue3';
import { computed, watch } from 'vue';
import { useToast } from 'vue-toastification';

let alert = computed(() => usePage().props.value.flash.toast)
watch(alert, (val) => {
    if(!val) return
    toast(val.message, {
        type: val.type,
        onClose: () => {
            alert = null
        }
    })
})

</script>



<template>
{{ alert }}

</template>