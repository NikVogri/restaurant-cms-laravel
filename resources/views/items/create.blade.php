<x-app>

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('items.index') }}">Dashboard</a> / <a href="{{ route('items.index') }}">Items</a>
            / New
        </li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Add New Item
        </div>
        <div class="card-body">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @error('image')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"
                        class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-danger text-small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add New</button>
                </div>

            </form>
        </div>
    </div>
    </div>
</x-app>
