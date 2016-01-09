<nav role="navigation">
      <ul class="nav">
          {!! System\Sidebar::make()->out() !!}
          <li class="menu-accordion">
              <a href="javascript:;">
                  <i class="icon-frame"></i>
                  <span>Monitorizare energetica</span>
              </a>
              <ul class="sub-menu">
                  <li class="menu-accordion">
                      <a href="javascript:;">
                          <i class="toggle-accordion"></i>
                          <span>Consumuri utilitati</span>
                      </a>
                      <ul class="sub-menu">
                          <li>
                              <a href="{!! route('consum_institutie',['per' => '1']) !!}">
                                  <span>Consum Institutie - Lunar</span>
                              </a>
                          </li>
                          <li>
                              <a href="{!! route('consum_institutie',['per' => '2']) !!}">
                                  <span>Consum Institutie - Anual</span>
                              </a>
                          </li>
                          <li>
                              <a href="javascript:;">
                                  <span>Consum Categorie Institutie</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="menu-accordion">
                      <a href="javascript:;">
                          <i class="toggle-accordion"></i>
                          <span>Consumuri iluminat public</span>
                      </a>
                      <ul class="sub-menu">
                          <li>
                              <a href="javascript:;">
                                  <span>Consum general</span>
                              </a>
                          </li>
                          <li>
                              <a href="javascript:;">
                                  <span>Consum puncte de masurare</span>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>
      </ul>
</nav>