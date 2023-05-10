<table class="table rounded-5">
    <thead class="table-dark rounded-5">
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Nick name</th>
        <th>Email</th>
        <th>Role</th>
        <th class="w-25">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach(range(1,5) as $user)
        <tr class="flex-row align-middle opacity-100">
            <th class="">
                <span class="transparent-text rounded-5">
                    Hello
                </span>

            </th>
            <th class="col-2 ">
                <span class="transparent-text rounded-5">My name is</span>

            </th>
            <th class="col-2 ">
                <span class="transparent-text rounded-5">just simple text</span>


            </th>
            <th class="col-2 ">
                <span class="transparent-text rounded-5">Hello</span>

            </th>
            <th class="col-2 ">
                <span class="transparent-text rounded-5">My name is</span>

            </th>
            <th class="col-2 ">
                <span class=" transparent-text rounded-5">My name is</span>

            </th>
        </tr>
    @endforeach
    </tbody>

</table>


