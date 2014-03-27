<ul>
<li @if (!isset($actCat) || $actCat =='home')
      class="select"
    @endif
>
    Home
</li>
<li @if (isset($actCat) && $actCat =='cat')
    class="select"
    @endif
    >
    New Arriver
</li>
</ul>