<x-layout>
    <x-slot name='content'>
        <article>
            <h1>
                {{$todo->title}}
            </h1>
            <div>
                <p>
                    Author:
                    <a href="/users/{{$todo->user->id}}">
                        {{$todo->user->name}}
                    </a>
                </p>
                <p>
                    Category:
                    <a href="/categories/{{$todo->category->id}}">
                        {{$todo->category->title}}
                    </a>
                </p>

                <p>
                    {{$todo->body}}
                </p>

                <button onclick="">

                </button>
            </div>

            <a href="/todos">go back</a>
        </article>

    </x-slot>

</x-layout>
