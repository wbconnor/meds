<style>
  .slide {
    margin-right: 10px;
  }
</style>
<template>
    <nav class="navbar navbar-light bg-light">
        <a href="/" class="navbar-brand">Meds</a>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a  v-if="user != false" href="/thing/new" class="slide">
                    <svg width="24" height="24" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                </a>

                <a  v-if="user != false" :href="'/users/'+ user.id" class="slide">
                    <svg width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z"/></svg>
                </a>

                <a v-else href="/login" class="slide">
                    <svg width="24" height="24" viewBox="0 0 24 24"><path d="M10 16c0-1.104.896-2 2-2s2 .896 2 2c0 .738-.404 1.376-1 1.723v2.277h-2v-2.277c-.596-.347-1-.985-1-1.723zm11-6v14h-18v-14h3v-4c0-3.313 2.687-6 6-6s6 2.687 6 6v4h3zm-13 0h8v-4c0-2.206-1.795-4-4-4s-4 1.794-4 4v4zm11 2h-14v10h14v-10z"/></svg>
                </a>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    Name: 'navbar',
    props: [
        'user',
        'csrf_token'
    ],
    data: function() {
        return {
            expandSearch:false
        }
    },
    methods: {
        slide(el) {
            return this.expandSearch = !this.expandSearch;
        }
    }
};
</script>
