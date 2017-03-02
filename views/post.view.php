<form class="xlarge" action="post.php" method="post">
    <div class="panel panel-default">
        <!-- Title -->
        <div class="panel-heading">
            <h2 class="panel-title">Post title:</h2>
        </div>
        <input type="text" name="title" class="form-control" placeholder="Top 10 coolest cats!">

        <!-- Content -->
        <div class="panel-heading">
            <h3 class="panel-title">Content:</h3>
        </div>
        <textarea type="text" name="content" class="form-control textarea" rows="12" placeholder="1. Jimmy &#10;2. Roger &#10;3. Etc. . ."></textarea>

        <div class="panel-heading inline">
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0 fill" name="category">
                <option selected="">Categories</option>
                <option value="1">Hardware</option>
                <option value="2">Software</option>
                <option value="3">Game Development</option>
            </select>
        </div>
    </div>
</form>