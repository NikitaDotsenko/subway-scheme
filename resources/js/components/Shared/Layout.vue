<template>
    <main>
        <div>
            <inertia-link href="/">Map</inertia-link>
            <inertia-link href="/about">List</inertia-link>
            <inertia-link href="/contact">Contact</inertia-link>
        </div>

        <slot/>
    </main>
</template>
<style scoped>
    main{
        display: flex;
        flex-direction: row;
    }
</style>
