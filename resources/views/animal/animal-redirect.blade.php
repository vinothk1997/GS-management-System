<form id="myForm" action="{{ route('animal.create') }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="familyId" value="{{ $family_id }}">
</form>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        document.getElementById('myForm').submit();
    });
</script>