
            <div class="login-place" id="login-place">
              <div class="word">
                <p>
                  Hãy tham gia vào để trở thành thành viên của
                  <strong>LEARN X2</strong> <br />và tham gia hỏi đáp cùng các
                  bạn khác!!!<br />
                </p>
              </div>
              <div class="login">
                <button id="btn">Đăng nhập</button>
                <button id="btn2">Đăng kí</button>
              </div>
            </div>

            <div class="Page-login">
          <i
            class="fa-solid fa-circle-xmark"
            onClick="{closeform}"
            id="close"
          ></i>
          <form class="loginform">
            <h4
              style="
                margin: 0px;
                padding: 4px 0;
                color: #4285f4;
                font-size: 24px;
                font-weight: 700;
                text-transform: uppercase;
              "
            >
              ĐĂNG NHẬP
            </h4>
            <div class="login-form" id="loginform">
              <label for="username">Tên đăng nhập:</label>
              <input type="text" id="username" name="username" required />
              <label for="password">Mật khẩu:</label>
              <input type="password" id="password" name="password" required />
            </div>
            <input
              id="login-btn"
              class="loginbtnnn"
              type="submit"
              value="Đăng nhập"
            />
          </form>
          <div class="NOacc">
            <p>
              Chưa có tài khoản?
              <span id="movetosignup"> Đăng kí </span>
            </p>
          </div>

          <div class="other-option">
            <ul>
              <li>
                <a href="">
                  <i class="fa-brands fa-facebook fa-2xl"></i>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="fa-brands fa-google-plus fa-2xl"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="Page-signup">
          <i class="fa-solid fa-circle-xmark" id="close2"></i>
          <form class="signupform" >
            <h4
              style="
                margin: 0px;
                padding: 4px 0;
                color: #4285f4;
                font-size: 24px;  
                font-weight: 700;
                text-transform: uppercase;
              "
            >
              ĐĂNG KÍ
            </h4>
            <div class="login-form" id="signupform">
              <label for="">Tên đăng nhập:</label>
              <input type="text" id="username2"  required />
              <label for="">Mật khẩu:</label>
              <input type="password" id="password2"  required />
              <label for="">Xác nhận pass:</label>
              <input type="password" id="password3"  required />
              <label >Email:</label>
              <input type="email" id="email"  required />
            </div>
            <input id="login-btn2" type="submit" value="Đăng kí" />
         
          </form>
          <div class="Hasacc">
            <p>
              Đã có tài khoản
              <span id="btnmovetologin"> Đăng nhập </span>
            </p>
          </div>
<!--    
          <div class="other-option">
            <ul>
              <li>
                <a href="">
                  <i class="fa-brands fa-facebook fa-2xl"></i>
                </a>
              </li>
            </ul>
          </div> -->
 
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
