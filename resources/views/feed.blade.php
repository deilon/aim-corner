@include('Layouts.top')

<section id="feed-nav" class="mt-5">
  <div class="container mx-auto px-6">
    <div class="flex items-center space-x-10 bg-white border border-slate-300 rounded-md px-6">
      <a href="#" class="py-5 pe-2 border-b-2 border-black"><i class="bi bi-house-fill mr-2"></i> For you</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-asterisk mr-2"></i> Show all</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-people-fill mr-2"></i> Following</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-mortarboard-fill mr-2"></i> Students</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-person-fill mr-2"></i> Instructors</a>
      <a href="#" class="py-5 pe-2"><i class="bi bi-person-badge-fill mr-2"></i> Administrators</a>
    </div>
  </div>
</section>
    
@include('scripts')
@include('Layouts.bottom')