<template>
    <div id="recomendations-holder" class="column">
        <h2>"{{ header }}</h2>
        <p>{{ text }}"</p>
        <div id="recomendations-person-holder">
            <img id="recomendations-photo-holder" :src="photo" alt="">
            <div id="recomendations-name-holder">
                <p>{{ name }}</p>
                <p>{{ position }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            header: 'Lorem ipsum dolor sit amet, consectetuer',
            text: 'consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
            photo: '/images/man-photo.png',
            name: 'John Smith',
            position: 'Instructor'
        }
    }
}
</script>
