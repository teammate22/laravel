<template>
    <div v-if="article" class="alert alert-primary" role="alert">
        Добавлена новая статья:
        <strong>
            <a :href="`/news/${article.id}`">
                {{ article.title }}
            </a>
        </strong>
    </div>
</template>

<script lang="ts">
export default {
    data() {
        return {
            article: null as null | { id: number; title: string }
        };
    },
    created() {
        (window as any).Echo
            .channel('test')
            .listen('NewArticleEvent', (data: any) => {
                console.log('New article:', data);
                this.article = data;
            });
    }
};
</script>
