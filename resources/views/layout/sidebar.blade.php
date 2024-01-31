<div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ url('/') }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false"><i class="mdi mdi-sale"></i><span class="hide-menu">Penjualan</span></a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('pembelian') }}" aria-expanded="false"><i class="mdi mdi-shopping"></i><span class="hide-menu">Pembelian</span></a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('produk') }}" aria-expanded="false"><i class="mdi mdi-playlist-check"></i><span class="hide-menu">Produk</span></a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('supplier') }}" aria-expanded="false"><i class="mdi mdi-account-star"></i><span class="hide-menu">Supplier</span></a>
              </li>

              

              
              
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>