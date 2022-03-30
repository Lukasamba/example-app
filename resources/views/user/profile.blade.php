@include('home')
<div class="w-full md:w-5/5 p-8 bg-white shadow-md">
    <div class="rounded  shadow p-6">
      <div class="pb-6">
        <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
        <div class="flex">
          <input disabled id="name" class="border-1  rounded-r px-4 py-2 w-full" type="text" value="{{$data->name}}" />
        </div>
      </div>
      <div class="pb-4">
        <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
        <input disabled id="email" class="border-1  rounded-r px-4 py-2 w-full" type="email" value="{{$data->email}}" />
        <span class="text-gray-600 pt-4 block opacity-70">Personal login information of your account</span>
      </div>
    </div>
  </div>