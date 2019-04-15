<template>
    <section id="top-statistics">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-right">
                    <slot name="top-statistics-left-img"></slot>
                    <div class="top-statistics-count">{{ certificatesCount }}</div>
                    <slot name="top-statistics-left-text"></slot>
                </div>
                <div class="col-lg-4 text-center">
                    <slot name="top-statistics-middle-img"></slot>
                    <div class="top-statistics-count">{{ coursesCount }}</div>
                    <slot name="top-statistics-middle-text"></slot>
                </div>
                <div class="col-lg-4 text-left">
                    <slot name="top-statistics-right-img"></slot>
                    <div class="top-statistics-count">{{ hoursCount }}</div>
                    <slot name="top-statistics-right-text"></slot>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    data () {
        return {
            certificatesCount: '18',
            coursesCount: '85',
            hoursCount: '126'
        }
    }
}
</script>
