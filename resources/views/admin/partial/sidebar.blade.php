<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="{{Request::segment(1)=='dashboard' && Request::segment(2)== null?'active-page':''}}">
            <a  href="{{url('/dashboard')}}"><i data-feather="home"></i>Dashboard</a>
        </li>
        <li class="{{Request::segment(2)=='category'?'active-page':''}}">
            <a href="{{url('dashboard/category')}}">
                <i class="fas fa-list"></i> &nbsp; Category<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li class="{{Request::segment(2)=='category'?'active-subpage':''}}"><a href="{{url('dashboard/category')}}"><i class="far fa-circle"></i>View Category</a></li>
                <li><a href="{{url('dashboard/category/create')}}"><i class="far fa-circle"></i>Add Category</a></li>
                <li><a href="{{url('dashboard/category/del-category')}}"><i class="far fa-circle"></i>Deleted Category</a></li>
            </ul>
        </li>

        <li class="{{Request::segment(2)=='sub-category'?'active-page':''}}">
            <a href="{{url('dashboard/sub-category')}}">
                <i class="far fa-list-alt"></i> &nbsp; Sub Category<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li class="{{Request::segment(2)=='sub-category'?'active-subpage':''}}">
                    <a href="{{url('dashboard/sub-category')}}"><i class="far fa-circle"></i>View Sub-Category</a>
                </li>
                <li><a href="{{url('dashboard/sub-category/create')}}"><i class="far fa-circle"></i>Add Sub-Category</a></li>
                <li><a href="{{url('dashboard/sub-category/del-category')}}"><i class="far fa-circle"></i>Deleted Sub-Category</a></li>
            </ul>
        </li>

        <li class="{{Request::segment(2)=='brand'?'active-page':''}}">
            <a href="{{url('dashboard/brand')}}">
                <i class="fab fa-bandcamp"></i> &nbsp; Brand<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li class="{{Request::segment(2)=='brand'?'active-subpage':''}}">
                    <a href="{{url('dashboard/brand')}}"><i class="far fa-circle"></i>View Brand</a>
                </li>
                <li><a href="{{url('dashboard/brand/create')}}"><i class="far fa-circle"></i>Add Brand</a></li>
                <li><a href="{{url('dashboard/brand/del-category')}}"><i class="far fa-circle"></i>Deleted Brand</a></li>
            </ul>
        </li>
        <li class="{{Request::segment(2)=='product'?'active-page':''}}">
            <a href="{{url('dashboard/product')}}">
                <i class="fab fa-product-hunt"></i>&nbsp; Products <i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li class="{{Request::segment(2)=='product'?'active-subpage':''}}">
                    <a href="{{url('dashboard/product')}}"><i class="far fa-circle"></i>View products</a>
                </li>
                <li><a href="{{url('dashboard/product/create')}}"><i class="far fa-circle"></i>Add Products</a></li>
                <li><a href="{{url('dashboard/product/del/product')}}"><i class="far fa-circle"></i>Deleted Products</a></li>
            </ul>
        </li>

        <li class="{{Request::segment(2)=='bundle'?'active-page':''}}">
            <a href="{{url('dashboard/bundle')}}">
                <i class="fas fa-file-archive"></i>&nbsp; Bundle Products <i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul>
                <li class="{{Request::segment(2)=='bundle'?'active-subpage':''}}">
                    <a href="{{url('dashboard/bundle')}}"><i class="far fa-circle"></i>View Bundles</a>
                </li>
                <li><a href="{{url('dashboard/bundle/create')}}"><i class="far fa-circle"></i>Add Bundles</a></li>
                <li><a href="{{url('dashboard/bundle/del/product')}}"><i class="far fa-circle"></i>Deleted Products</a></li>
            </ul>
        </li>

        <li class="{{Request::segment(2).Request::segment(3)=='thumbnailall'?'active-page':''}}">
            <a href="{{url('dashboard/thumbnail/all')}}">  <i class="fas fa-image"></i>  &nbsp; All Thumbnails</a>
        </li>
        <li class="{{Request::segment(2).Request::segment(3)=='attributeall'?'active-page':''}}">
            <a href="{{url('dashboard/attribute/all')}}"> <i class="fab fa-adn"></i> &nbsp; All Attributes</a>
        </li>
    </ul>
</div>
