<template>
    <div class="flex flex-wrap">
        <div class="w-full text-center">
            <button ref="btnRef" v-on:mouseenter="toggleTooltip()" v-on:mouseleave="toggleTooltip()"
                class="bg-transparent ease-linear transition-all duration-150" type="button">
                <slot name="icon" />
            </button>
            <div ref="tooltipRef" v-bind:class="{ 'hidden mt-10': !showTooltip, 'block': showTooltip }"
                class="bg-amber-100 p-1 px-2 text-purple-700 font-semibold block z-50 text-xs rounded-md border border-purple-100">
                <slot name="description"/>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue"
import { createPopper } from "@popperjs/core"

const props = defineProps({
    placement: {
        required: false,
        default: 'bottom'
    }
})

const btnRef = ref()
const tooltipRef = ref()
const showTooltip = ref(false)

const toggleTooltip = () => {
    if (showTooltip.value) {
        showTooltip.value = false
    } else {
        showTooltip.value = true
        createPopper(btnRef.value, tooltipRef.value, {
            placement: props.placement
        })
    }
}

</script>