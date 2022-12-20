<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div id="container">

    <form method="post" action="{{ route('chats.store')}}">
        @csrf
        <div class="field">
            <label class="label">Contenuto</label>
            <div class="control">
            <textarea
                name="body"
                class="textarea"
                placeholder="Contenuto"
                minlength="5"
                maxlength="2000"
                required rows="10"
            >{{ old('body') }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link is-outlined">Pubblica</button>
            </div>
        </div>
    </form>



</div>
</body>
</html>
