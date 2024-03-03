<script setup lang="ts">
import Multiselect from '@vueform/multiselect';

defineProps<{
    options: { value: string; label: string }[];
}>();

</script>

<template>
    <Multiselect :options="options" :searchable="true" />
</template>
  
<style src="@vueform/multiselect/themes/default.css"></style>
<style lang="scss">
.multiselect {
    border: var(--bs-border-width) solid var(--bs-border-color);
    border-radius: var(--bs-border-radius);
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    min-height: auto;
    height: 38px;

    &:focus {
        color: var(--bs-body-color);
        background-color: var(--bs-body-bg);
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .multiselect-wrapper{
        min-height: auto;
    }

    .multiselect-option.is-selected{
        background: var(--bs-primary);
    }
}
</style>
  