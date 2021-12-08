<section class="py-12 bg-gray-cool-100">
  <div class="container">
    <div class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-{{ $columns ? $columns : '3' }} lg:gap-8">
      {!! $slot !!}
    </div>
  </div>
</section>