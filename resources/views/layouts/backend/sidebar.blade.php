<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->
    <!-- ========================================================= -->
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">
                    <!--HOME-->
                    <li class="active-item"><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                    <!--UI ELEMENTENTS-->


                    <li class="has-child-item {{request()->is('admin/blog*') || request()->is('admin/tag*') || request()->is('admin/blog-category*') || request()->is('admin/blog-writer*')   ? 'open-item' : 'close-item' }}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Blog</span></a>
                        <ul class="nav child-nav level-1">
                            <li class="{{ request()->routeIs('admin.blog.writer.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.blog.writer.index')}}">Writer</a></li>
                            <li class="{{ request()->routeIs('admin.blog.category.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.blog.category.index')}}">Category</a></li>
                            <li class="{{ request()->routeIs('admin.blog.tag.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.blog.tag.index') }}">Tag</a></li>
                            <li class="{{ request()->routeIs('admin.blog.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.blog.index')}}">Blog</a></li>


                        </ul>
                    </li>

                    <li class="has-child-item {{request()->is('admin/project*') || request()->is('admin/project-category*')   ? 'open-item' : 'close-item' }}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Project</span></a>
                        <ul class="nav child-nav level-1">

                            <li class="{{ request()->routeIs('admin.project.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.project.index')}}">Project</a></li>



                        </ul>
                    </li>

                    <li class="has-child-item {{request()->is('admin/gallery*')   ? 'open-item' : 'close-item' }}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Gallery</span></a>
                        <ul class="nav child-nav level-1">

                            <li class="{{ request()->routeIs('admin.gallery.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.gallery.index')}}">Gallery</a></li>



                        </ul>
                    </li>
                    <li class="has-child-item {{request()->is('admin/factory*')   ? 'open-item' : 'close-item' }}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Our Factory</span></a>
                        <ul class="nav child-nav level-1">

                            <li class="{{ request()->routeIs('admin.factory.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.factory.index')}}">Factory</a></li>



                        </ul>
                    </li>
                    <li class="has-child-item {{ request()->is('admin/slider*') || request()->is('admin/product*') || request()->is('admin/team*') || request()->is('admin/client*') || request()->is('admin/subscriber*') || request()->is('admin/review*') || request()->is('admin/why-choose-us*') || request()->is('admin/faq*') || request()->is('admin/service*') || request()->is('admin/pages*') || request()->is('admin/page-seo*') || request()->is('admin/menu*') || request()->is('admin/patner*') ? 'open-item' : 'close-item' }}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Frontend</span></a>
                        <ul class="nav child-nav level-1">

                            <li class="{{ request()->routeIs('admin.slider.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.slider.index')}}">Slider</a></li>
                            <li class="{{ request()->routeIs('admin.faq.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.faq.index')}}">Faq</a></li>
                            <li class="{{ request()->routeIs('admin.patner.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.patner.index')}}">Client</a></li>
                            <li class="{{ request()->routeIs('admin.service.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.service.index')}}">Service</a></li>
                            <li class="{{ request()->routeIs('admin.menu.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.menu.index')}}">Navigation Menu</a></li>
                            <li class="{{ request()->routeIs('admin.page.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.page.index')}}">Pages</a></li>
                            <li class="{{ request()->routeIs('admin.page-seo.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.page-seo.index')}}">Page SEO</a></li>
                            <li class="{{ request()->routeIs('admin.review.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.review.index')}}">Review</a></li>
                            <li class="{{ request()->routeIs('admin.why-choose-us.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.why-choose-us.index')}}">Why Choose Us</a></li>
                            <li class="{{ request()->routeIs('admin.subscriber.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.subscriber.index')}}">Subscriber</a></li>
                            <li class="{{ request()->routeIs('admin.product.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.product.index')}}">Product</a></li>

                            <li class="{{ request()->routeIs('admin.team.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.team.index')}}">Team Member</a></li>
                            <li class="{{ request()->routeIs('admin.client.*') ? 'active-item' : 'close-item' }}"><a href="{{route('admin.client.index')}}">Client</a></li>
                        </ul>
                    </li>


                    <li class="has-child-item {{ request()->is('admin/roles*') || request()->is('admin/permission*') ||  request()->is('admin/user*')|| request()->is('admin/customer*')  ? 'open-item' : 'close-item' }}">
                        <a><i class="fa fa-desktop"></i><span>User</span></a>
                        <ul class="nav child-nav level-1">

                            <li class="{{ request()->routeIs('admin.roles.*') ? 'active-item' : 'close-item' }}">
                                <a href="{{ route('admin.roles.index') }}">

                                    <span>Role</span>
                                </a>
                            </li>

                            <li class="{{ request()->routeIs('admin.user.*') ? 'active-item' : 'close-item' }}">
                                <a href="{{ route('admin.user.index') }}">

                                    <span>User</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.permission.*') ? 'active-item' : 'close-item' }}">
                                <a href="{{ route('admin.permission.index') }}">

                                    <span>Permission</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.customer.*') ? 'active-item' : 'close-item' }}">
                                <a href="{{ route('admin.customer.index') }}">

                                    <span>Customer</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-child-item {{ request()->is('admin/email*') || request()->is('admin/generalSetting*')  ? 'open-item' : 'close-item' }}">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Setting</span></a>
                        <ul class="nav child-nav level-1">
                            <li class="{{ request()->routeIs('admin.generalSetting.*') ? 'active-item' : 'close-item' }}">
                                <a href="{{ route('admin.generalSetting.index') }}">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span>Configurations</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.email.*') ? 'active-item' : 'close-item' }}">
                                <a href="{{ route('admin.email.index') }}">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span>Email Configuration</span>
                                </a>
                            </li>


                        </ul>
                    </li>


                </ul>
            </nav>
        </div>
    </div>
</div>
