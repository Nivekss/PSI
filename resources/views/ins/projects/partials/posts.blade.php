<div class="row task-list-row">
    <div class="col-xs-12">
        <ul class="task-list">
            <h5 class="title">Posts (@{{ numPosts }})</h5>
            <li v-on:click="editPost(post)" v-for="post in project.posts | orderBy 'createDate' reverse" class="post-@{{ post.id }}" >
                <div class="show-on-hover pull-right">
                    <span v-on:click="deletePost(post.id, $index)" class="ion-close-round"></span>
                </div>
                <div>
                    <h3>@{{ post.subject }}</h3>
                    <h5>@{{ post.body }}</h5>
                </div>
            </li>
        </ul>
    </div>
</div>