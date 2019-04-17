<template>
    <div class="column" id="progression-holder">
        <h2><slot name="progression-header"></slot></h2>
        <div id="progression-inner-holder">
            <slot name="progression-award-icon"></slot>
            <p id="progression-lvl">Level {{ progressionLvl }}</p>
            <p id="progression-xp">{{ progressionXp }} / {{ progressionXpForNextLvl }} XP</p>
            <div id="progression-rewards-holder">
                <img v-for="reward in rewards" :key="reward.id" :src="reward.reward">
            </div>
            <h2 id="progression-second-header"><slot name="progression-second-header"></slot></h2>
            <div class="progress-bar-holder" v-for="progress in progresses" :key="progress.id">
                    <div class="progress-subject">{{ progress.subject }}</div>
                    <div class="progress-lvl">{{ progress.level }}</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" 
                    v-bind:style="{backgroundColor:colors[Math.floor(Math.random() * colors.length)].color, 
                    width:progress.progress+'%'}" 
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            progressionLvl: '14',
            progressionXp: '235',
            progressionXpForNextLvl: '500',
            
            rewards: [
                {reward: '/images/crown-icon.png'},
                {reward: '/images/silver-medal-icon.png'},
                {reward: '/images/bronze-medal-icon.png'},
                {reward: '/images/golden-medal-icon.png'}
            ],
            progresses: [
                {subject: 'Java', progress: '48', level: 'level'},
                {subject: 'PHP', progress: '90', level: 'level',},
                {subject: 'Python', progress: '70', level: 'level'},
                {subject: 'React', progress: '25', level: 'level'},
                {subject: 'Spanish', progress: '65', level: 'level'}
            ],
            colors: [
                {color: '#7066ff'},
                {color: '#4cbdae'},
                {color: '#ee4379'},
                {color: '#00bcf9'},
                {color: '#f15c42'},
            ]
        }
    }    
}
</script>
