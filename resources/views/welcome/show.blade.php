@extends('layouts.app')
@section('content')

        <!-- Content start-->
        <div id="content" class="container mt-5">
            <div class="col col-12 col-sm-12 col-md-10 offset-md-1">
                <div
                    id="carouselExampleControls"
                    class="carousel slide carousel-fade"
                    data-ride="carousel"
                    data-interval="false"
                >
                    <div class="carousel-inner">
                        <div class="carousel-item active my-custom-bg auth-section rounded">
                            <div class="jumbotron py-3 my-custom-bg auth-section">
                                <img
                                    src="{{ asset('uploads/' . $game->price_image)}}"
                                    width="360"
                                    height="360"
                                    class="img-fluid rounded mx-auto d-block mb-3"
                                    id="price_image"
                                    alt="Winner price"
                                />
                                <div id="clockdiv">
                                    <div>
                                        <span class="days">00</span>
                                        <div class="smalltext">Days</div>
                                    </div>
                                    <div>
                                        <span class="hours">00</span>
                                        <div class="smalltext">Hours</div>
                                    </div>
                                    <div>
                                        <span class="minutes">05</span>
                                        <div class="smalltext">Minutes</div>
                                    </div>
                                    <div>
                                        <span class="seconds">00</span>
                                        <div class="smalltext">Seconds</div>
                                    </div>
                                </div>
                                <div id="drawing-area">
                                    <canvas
                                        id="draw-game"
                                        width="880"
                                        height="80"
                                    ></canvas>
                                </div>
                                <div class="container">
                                    <div class="row mx-auto my-3 w-75">
                                        <div
                                            class="col-12 col-sm-12 col-md-1"
                                        ></div>
                                        <div
                                            class="col-12 col-sm-12 col-md-5 px-0 mr-1"
                                        >
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-around align-items-center p-2"
                                                >
                                                    Entry Cost
                                                    <span
                                                        class="badge badge-primary badge-pill p-2"
                                                        >£{{$game->price ?? 0}}</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="col-12 col-sm-12 col-md-5 px-0"
                                        >
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-around align-items-center p-2"
                                                >
                                                    Player Count
                                                    <span
                                                        class="badge badge-primary badge-pill p-2"
                                                        id="player_count1"
                                                        >{{$game->total_joined ?? 0}}/300</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="col-12 col-sm-12 col-md-1"
                                        ></div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="col-6 col-sm-6 col-md-6 col-lg-4 m-auto"
                                        >
                                            <button
                                                type="button"
                                                onclick="addToDraw();"
                                                class="btn btn-primary btn-lg btn-block"
                                            >
                                                Enter Draw
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item my-custom-bg auth-section rounded">
                            <div class="jumbotron my-custom-bg auth-section">
                                <img
                                    src="{{ asset('uploads/' . $game->ads_image)}}"
                                    class="img-fluid rounded mx-auto d-block"
                                    alt="Responsive image"
                                />
                            </div>
                        </div>
                        <div class="carousel-item my-custom-bg auth-section rounded">
                            <div class="jumbotron my-custom-bg auth-section mt-3">
                                <div>
                                    <ul
                                        class="pagination m-auto d-flex flex-wrap pt-3"
                                    >
                                        @for ($i = 1; $i <= 300; $i++)
                                            <li 
                                            class="page-item m-1 {{in_array($i, $allSoldNumbersArray) ? 'active' : ''}} " 
                                            id="num{{$i}}">
                                                <a class="page-link">{{$i}}</a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>

                                <div id="drawing-area">
                                    <canvas
                                        id="draw-game2"
                                        width="880"
                                        height="80"
                                    ></canvas>
                                </div>

                                <div class="container">
                                    <div class="row mx-auto my-3 w-75">
                                        <div
                                            class="col-12 col-sm-12 col-md-1"
                                        ></div>
                                        <div
                                            class="col-12 col-sm-12 col-md-5 px-0 mr-1"
                                        >
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-around align-items-center p-2"
                                                >
                                                    Entry Cost
                                                    <span
                                                        class="badge badge-primary badge-pill p-2"
                                                        >${{$game->price ?? 0}}</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="col-12 col-sm-12 col-md-5 px-0"
                                        >
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-around align-items-center p-2"
                                                >
                                                    Player Count
                                                    <span
                                                        id="player_count2"
                                                        class="badge badge-primary badge-pill p-2"
                                                        >{{$game->total_joined ?? 0}}/300</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                        <div
                                            class="col-12 col-sm-12 col-md-1"
                                        ></div>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="col-6 col-sm-6 col-md-6 col-lg-4 m-auto"
                                        >
                                            <button
                                                type="button"
                                                onclick="addToDraw();"
                                                class="btn btn-primary btn-lg btn-block mb-3"
                                            >
                                                Enter Draw
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#carouselExampleControls"
                        role="button"
                        data-slide="prev"
                    >
                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#carouselExampleControls"
                        role="button"
                        data-slide="next"
                    >
                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <input type="hidden" name="gameId" id="gameId" value="{{$game->id}}">
                    <input type="hidden" name="isCompleted" id="isCompleted" value="{{$game->is_completed}}">
                    
                    <input type="hidden" name="drawn_number" id="drawn_number" value="{{$winnerData ?? 0}}">
                    <input type="hidden" name="time_in_mins" id="time_in_mins" value="{{!empty($game->counter_time) ? round((strtotime('now') - strtotime($game->counter_time)) / 60,2) : 0}}">
                   
                    <input type="hidden" name="player_count" id="player_count" value="{{count($allSoldNumbersArray) ?? 0}}">
                    

                </div>
                <!-- Button to Open the Modal -->
                <button type="button" id="paypal-modal-btn" class="btn btn-primary d-none" data-toggle="modal" data-target="#myModal-paypal">
                  Open modal
                </button>

                <!-- The Modal -->
                <div class="modal" id="myModal-paypal">
                <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Pay with Paypal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="item">
                            <!-- Checkout button -->
                            <div id="paypal-button"></div>
                        </div>
                        <script>
                            paypal.Button.render({
                                // Configure environment
                                env: 'production', // 'production' or 'sandbox'
                                client: {
                                    sandbox: 'AYsmowWwavd1bkfzrOKseR6rwFk5toOvsKBMj_ksnf0p8YmY0uHxbfqfqfsK-t-KfMyTiAAXixHbR_qP', // sendbox = 'AYlWdjkATDp5DYe2cQotUmGRRqg-dOslH-WF0XOaZDcg7hOiBcm6hVe0Ci4_xkBXUfS7ttL7BFjEXbO0',
                                    production: 'AYsmowWwavd1bkfzrOKseR6rwFk5toOvsKBMj_ksnf0p8YmY0uHxbfqfqfsK-t-KfMyTiAAXixHbR_qP' // sendbox = 'AYlWdjkATDp5DYe2cQotUmGRRqg-dOslH-WF0XOaZDcg7hOiBcm6hVe0Ci4_xkBXUfS7ttL7BFjEXbO0'
                                },
                                // Customize button (optional)
                                locale: 'en_US',
                                style: {
                                    size: 'responsive',
                                    color: 'blue',
                                    shape: 'pill',
                                    tagline: false,
                                    label: 'paypal'
                                },
                                // Set up a payment
                                payment: function(data, actions) {
                                    // console.log('payment::', data, actions);
                                    return actions.payment.create({
                                        transactions: [{
                                            amount: {
                                                total: '{{$game->price}}',
                                                currency: 'USD',
                                            },
                                            item_list: {
                                                items: [{
                                                    "name": "{{$game->title}}",
                                                    "sku": "001",
                                                    "price": "{{$game->price}}",
                                                    "currency": "USD",
                                                    "quantity": 1
                                                }]
                                            },
                                            description: "Hat for the best team ever"
                                        }]
                                    });
                                },
                                // Execute the payment
                                onAuthorize: function(data, actions) {
                                    return actions.payment.execute()
                                        .then(function() {
                                            window.location = "/paypal/process?paymentID=" + data.paymentID + "&token=" + data.paymentToken + "&payerID=" + data.payerID + "&gid={{$game->id}}&uid={{auth()->user()->id}}";
                                        });
                                },
                                onCancel: function(data, actions) {
                                    // actions.redirect(); //redirect to cancel_url page/endpoint
                                    console.log("You have cancled.");
                                },

                                onError: function(err) {
                                    console.log("PayPal has encountered error.!");
                                }
                            }, '#paypal-button');
                        </script>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- Button to Open the Modal end -->
            </div>
        </div>
        @if($game->is_completed)
        <style>
            #confetti {
              background: #aaaaa;
              height: 100%;
              left: 0px;
              position: fixed;
              top: 0px;
              width: 100%;
              z-index: 9999;
            }
          </style>
          <div id="confetti"></div>
          <script src="https://code.jquery.com/jquery-1.11.0.js"></script>
          <script>
            /* Confetti by Patrik Svensson (http://metervara.net) */
            $(document).ready(function() {
              var frameRate = 60;
              var dt = 1.0 / frameRate;
              var DEG_TO_RAD = Math.PI / 180;
              var RAD_TO_DEG = 180 / Math.PI;
              var colors = [
                ["#df0049", "#660671"],
                ["#00e857", "#005291"],
                ["#2bebbc", "#05798a"],
                ["#ffd200", "#b06c00"]
              ];
      
              function Vector2(_x, _y) {
                (this.x = _x), (this.y = _y);
                this.Length = function() {
                  return Math.sqrt(this.SqrLength());
                };
                this.SqrLength = function() {
                  return this.x * this.x + this.y * this.y;
                };
                this.Equals = function(_vec0, _vec1) {
                  return _vec0.x == _vec1.x && _vec0.y == _vec1.y;
                };
                this.Add = function(_vec) {
                  this.x += _vec.x;
                  this.y += _vec.y;
                };
                this.Sub = function(_vec) {
                  this.x -= _vec.x;
                  this.y -= _vec.y;
                };
                this.Div = function(_f) {
                  this.x /= _f;
                  this.y /= _f;
                };
                this.Mul = function(_f) {
                  this.x *= _f;
                  this.y *= _f;
                };
                this.Normalize = function() {
                  var sqrLen = this.SqrLength();
                  if (sqrLen != 0) {
                    var factor = 1.0 / Math.sqrt(sqrLen);
                    this.x *= factor;
                    this.y *= factor;
                  }
                };
                this.Normalized = function() {
                  var sqrLen = this.SqrLength();
                  if (sqrLen != 0) {
                    var factor = 1.0 / Math.sqrt(sqrLen);
                    return new Vector2(this.x * factor, this.y * factor);
                  }
                  return new Vector2(0, 0);
                };
              }
              Vector2.Lerp = function(_vec0, _vec1, _t) {
                return new Vector2(
                  (_vec1.x - _vec0.x) * _t + _vec0.x,
                  (_vec1.y - _vec0.y) * _t + _vec0.y
                );
              };
              Vector2.Distance = function(_vec0, _vec1) {
                return Math.sqrt(Vector2.SqrDistance(_vec0, _vec1));
              };
              Vector2.SqrDistance = function(_vec0, _vec1) {
                var x = _vec0.x - _vec1.x;
                var y = _vec0.y - _vec1.y;
                return x * x + y * y + z * z;
              };
              Vector2.Scale = function(_vec0, _vec1) {
                return new Vector2(_vec0.x * _vec1.x, _vec0.y * _vec1.y);
              };
              Vector2.Min = function(_vec0, _vec1) {
                return new Vector2(
                  Math.min(_vec0.x, _vec1.x),
                  Math.min(_vec0.y, _vec1.y)
                );
              };
              Vector2.Max = function(_vec0, _vec1) {
                return new Vector2(
                  Math.max(_vec0.x, _vec1.x),
                  Math.max(_vec0.y, _vec1.y)
                );
              };
              Vector2.ClampMagnitude = function(_vec0, _len) {
                var vecNorm = _vec0.Normalized;
                return new Vector2(vecNorm.x * _len, vecNorm.y * _len);
              };
              Vector2.Sub = function(_vec0, _vec1) {
                return new Vector2(
                  _vec0.x - _vec1.x,
                  _vec0.y - _vec1.y,
                  _vec0.z - _vec1.z
                );
              };
      
              function EulerMass(_x, _y, _mass, _drag) {
                this.position = new Vector2(_x, _y);
                this.mass = _mass;
                this.drag = _drag;
                this.force = new Vector2(0, 0);
                this.velocity = new Vector2(0, 0);
                this.AddForce = function(_f) {
                  this.force.Add(_f);
                };
                this.Integrate = function(_dt) {
                  var acc = this.CurrentForce(this.position);
                  acc.Div(this.mass);
                  var posDelta = new Vector2(this.velocity.x, this.velocity.y);
                  posDelta.Mul(_dt);
                  this.position.Add(posDelta);
                  acc.Mul(_dt);
                  this.velocity.Add(acc);
                  this.force = new Vector2(0, 0);
                };
                this.CurrentForce = function(_pos, _vel) {
                  var totalForce = new Vector2(this.force.x, this.force.y);
                  var speed = this.velocity.Length();
                  var dragVel = new Vector2(this.velocity.x, this.velocity.y);
                  dragVel.Mul(this.drag * this.mass * speed);
                  totalForce.Sub(dragVel);
                  return totalForce;
                };
              }
      
              function ConfettiPaper(_x, _y) {
                this.pos = new Vector2(_x, _y);
                this.rotationSpeed = Math.random() * 600 + 800;
                this.angle = DEG_TO_RAD * Math.random() * 360;
                this.rotation = DEG_TO_RAD * Math.random() * 360;
                this.cosA = 1.0;
                this.size = 5.0;
                this.oscillationSpeed = Math.random() * 1.5 + 0.5;
                this.xSpeed = 40.0;
                this.ySpeed = Math.random() * 60 + 50.0;
                this.corners = new Array();
                this.time = Math.random();
                var ci = Math.round(Math.random() * (colors.length - 1));
                this.frontColor = colors[ci][0];
                this.backColor = colors[ci][1];
                for (var i = 0; i < 4; i++) {
                  var dx = Math.cos(this.angle + DEG_TO_RAD * (i * 90 + 45));
                  var dy = Math.sin(this.angle + DEG_TO_RAD * (i * 90 + 45));
                  this.corners[i] = new Vector2(dx, dy);
                }
                this.Update = function(_dt) {
                  this.time += _dt;
                  this.rotation += this.rotationSpeed * _dt;
                  this.cosA = Math.cos(DEG_TO_RAD * this.rotation);
                  this.pos.x +=
                    Math.cos(this.time * this.oscillationSpeed) * this.xSpeed * _dt;
                  this.pos.y += this.ySpeed * _dt;
                  if (this.pos.y > ConfettiPaper.bounds.y) {
                    this.pos.x = Math.random() * ConfettiPaper.bounds.x;
                    this.pos.y = 0;
                  }
                };
                this.Draw = function(_g) {
                  if (this.cosA > 0) {
                    _g.fillStyle = this.frontColor;
                  } else {
                    _g.fillStyle = this.backColor;
                  }
                  _g.beginPath();
                  _g.moveTo(
                    this.pos.x + this.corners[0].x * this.size,
                    this.pos.y + this.corners[0].y * this.size * this.cosA
                  );
                  for (var i = 1; i < 4; i++) {
                    _g.lineTo(
                      this.pos.x + this.corners[i].x * this.size,
                      this.pos.y + this.corners[i].y * this.size * this.cosA
                    );
                  }
                  _g.closePath();
                  _g.fill();
                };
              }
              ConfettiPaper.bounds = new Vector2(0, 0);
      
              function ConfettiRibbon(
                _x,
                _y,
                _count,
                _dist,
                _thickness,
                _angle,
                _mass,
                _drag
              ) {
                this.particleDist = _dist;
                this.particleCount = _count;
                this.particleMass = _mass;
                this.particleDrag = _drag;
                this.particles = new Array();
                var ci = Math.round(Math.random() * (colors.length - 1));
                this.frontColor = colors[ci][0];
                this.backColor = colors[ci][1];
                this.xOff = Math.cos(DEG_TO_RAD * _angle) * _thickness;
                this.yOff = Math.sin(DEG_TO_RAD * _angle) * _thickness;
                this.position = new Vector2(_x, _y);
                this.prevPosition = new Vector2(_x, _y);
                this.velocityInherit = Math.random() * 2 + 4;
                this.time = Math.random() * 100;
                this.oscillationSpeed = Math.random() * 2 + 2;
                this.oscillationDistance = Math.random() * 40 + 40;
                this.ySpeed = Math.random() * 40 + 80;
                for (var i = 0; i < this.particleCount; i++) {
                  this.particles[i] = new EulerMass(
                    _x,
                    _y - i * this.particleDist,
                    this.particleMass,
                    this.particleDrag
                  );
                }
                this.Update = function(_dt) {
                  var i = 0;
                  this.time += _dt * this.oscillationSpeed;
                  this.position.y += this.ySpeed * _dt;
                  this.position.x +=
                    Math.cos(this.time) * this.oscillationDistance * _dt;
                  this.particles[0].position = this.position;
                  var dX = this.prevPosition.x - this.position.x;
                  var dY = this.prevPosition.y - this.position.y;
                  var delta = Math.sqrt(dX * dX + dY * dY);
                  this.prevPosition = new Vector2(this.position.x, this.position.y);
                  for (i = 1; i < this.particleCount; i++) {
                    var dirP = Vector2.Sub(
                      this.particles[i - 1].position,
                      this.particles[i].position
                    );
                    dirP.Normalize();
                    dirP.Mul((delta / _dt) * this.velocityInherit);
                    this.particles[i].AddForce(dirP);
                  }
                  for (i = 1; i < this.particleCount; i++) {
                    this.particles[i].Integrate(_dt);
                  }
                  for (i = 1; i < this.particleCount; i++) {
                    var rp2 = new Vector2(
                      this.particles[i].position.x,
                      this.particles[i].position.y
                    );
                    rp2.Sub(this.particles[i - 1].position);
                    rp2.Normalize();
                    rp2.Mul(this.particleDist);
                    rp2.Add(this.particles[i - 1].position);
                    this.particles[i].position = rp2;
                  }
                  if (
                    this.position.y >
                    ConfettiRibbon.bounds.y + this.particleDist * this.particleCount
                  ) {
                    this.Reset();
                  }
                };
                this.Reset = function() {
                  this.position.y = -Math.random() * ConfettiRibbon.bounds.y;
                  this.position.x = Math.random() * ConfettiRibbon.bounds.x;
                  this.prevPosition = new Vector2(this.position.x, this.position.y);
                  this.velocityInherit = Math.random() * 2 + 4;
                  this.time = Math.random() * 100;
                  this.oscillationSpeed = Math.random() * 2.0 + 1.5;
                  this.oscillationDistance = Math.random() * 40 + 40;
                  this.ySpeed = Math.random() * 40 + 80;
                  var ci = Math.round(Math.random() * (colors.length - 1));
                  this.frontColor = colors[ci][0];
                  this.backColor = colors[ci][1];
                  this.particles = new Array();
                  for (var i = 0; i < this.particleCount; i++) {
                    this.particles[i] = new EulerMass(
                      this.position.x,
                      this.position.y - i * this.particleDist,
                      this.particleMass,
                      this.particleDrag
                    );
                  }
                };
                this.Draw = function(_g) {
                  for (var i = 0; i < this.particleCount - 1; i++) {
                    var p0 = new Vector2(
                      this.particles[i].position.x + this.xOff,
                      this.particles[i].position.y + this.yOff
                    );
                    var p1 = new Vector2(
                      this.particles[i + 1].position.x + this.xOff,
                      this.particles[i + 1].position.y + this.yOff
                    );
                    if (
                      this.Side(
                        this.particles[i].position.x,
                        this.particles[i].position.y,
                        this.particles[i + 1].position.x,
                        this.particles[i + 1].position.y,
                        p1.x,
                        p1.y
                      ) < 0
                    ) {
                      _g.fillStyle = this.frontColor;
                      _g.strokeStyle = this.frontColor;
                    } else {
                      _g.fillStyle = this.backColor;
                      _g.strokeStyle = this.backColor;
                    }
                    if (i == 0) {
                      _g.beginPath();
                      _g.moveTo(
                        this.particles[i].position.x,
                        this.particles[i].position.y
                      );
                      _g.lineTo(
                        this.particles[i + 1].position.x,
                        this.particles[i + 1].position.y
                      );
                      _g.lineTo(
                        (this.particles[i + 1].position.x + p1.x) * 0.5,
                        (this.particles[i + 1].position.y + p1.y) * 0.5
                      );
                      _g.closePath();
                      _g.stroke();
                      _g.fill();
                      _g.beginPath();
                      _g.moveTo(p1.x, p1.y);
                      _g.lineTo(p0.x, p0.y);
                      _g.lineTo(
                        (this.particles[i + 1].position.x + p1.x) * 0.5,
                        (this.particles[i + 1].position.y + p1.y) * 0.5
                      );
                      _g.closePath();
                      _g.stroke();
                      _g.fill();
                    } else if (i == this.particleCount - 2) {
                      _g.beginPath();
                      _g.moveTo(
                        this.particles[i].position.x,
                        this.particles[i].position.y
                      );
                      _g.lineTo(
                        this.particles[i + 1].position.x,
                        this.particles[i + 1].position.y
                      );
                      _g.lineTo(
                        (this.particles[i].position.x + p0.x) * 0.5,
                        (this.particles[i].position.y + p0.y) * 0.5
                      );
                      _g.closePath();
                      _g.stroke();
                      _g.fill();
                      _g.beginPath();
                      _g.moveTo(p1.x, p1.y);
                      _g.lineTo(p0.x, p0.y);
                      _g.lineTo(
                        (this.particles[i].position.x + p0.x) * 0.5,
                        (this.particles[i].position.y + p0.y) * 0.5
                      );
                      _g.closePath();
                      _g.stroke();
                      _g.fill();
                    } else {
                      _g.beginPath();
                      _g.moveTo(
                        this.particles[i].position.x,
                        this.particles[i].position.y
                      );
                      _g.lineTo(
                        this.particles[i + 1].position.x,
                        this.particles[i + 1].position.y
                      );
                      _g.lineTo(p1.x, p1.y);
                      _g.lineTo(p0.x, p0.y);
                      _g.closePath();
                      _g.stroke();
                      _g.fill();
                    }
                  }
                };
                this.Side = function(x1, y1, x2, y2, x3, y3) {
                  return (x1 - x2) * (y3 - y2) - (y1 - y2) * (x3 - x2);
                };
              }
              ConfettiRibbon.bounds = new Vector2(0, 0);
              confetti = {};
              confetti.Context = function(parent) {
                var i = 0;
                var canvasParent = document.getElementById(parent);
                var canvas = document.createElement("canvas");
                canvas.width = canvasParent.offsetWidth;
                canvas.height = canvasParent.offsetHeight;
                canvasParent.appendChild(canvas);
                var context = canvas.getContext("2d");
                var interval = null;
                var confettiRibbonCount = 7;
                var rpCount = 30;
                var rpDist = 8.0;
                var rpThick = 8.0;
                var confettiRibbons = new Array();
                ConfettiRibbon.bounds = new Vector2(canvas.width, canvas.height);
                for (i = 0; i < confettiRibbonCount; i++) {
                  confettiRibbons[i] = new ConfettiRibbon(
                    Math.random() * canvas.width,
                    -Math.random() * canvas.height * 2,
                    rpCount,
                    rpDist,
                    rpThick,
                    45,
                    1,
                    0.05
                  );
                }
                var confettiPaperCount = 25;
                var confettiPapers = new Array();
                ConfettiPaper.bounds = new Vector2(canvas.width, canvas.height);
                for (i = 0; i < confettiPaperCount; i++) {
                  confettiPapers[i] = new ConfettiPaper(
                    Math.random() * canvas.width,
                    Math.random() * canvas.height
                  );
                }
                this.resize = function() {
                  canvas.width = canvasParent.offsetWidth;
                  canvas.height = canvasParent.offsetHeight;
                  ConfettiPaper.bounds = new Vector2(canvas.width, canvas.height);
                  ConfettiRibbon.bounds = new Vector2(canvas.width, canvas.height);
                };
                this.start = function() {
                  this.stop();
                  var context = this;
                  this.interval = setInterval(function() {
                    confetti.update();
                  }, 1000.0 / frameRate);
                };
                this.stop = function() {
                  clearInterval(this.interval);
                };
                this.update = function() {
                  var i = 0;
                  context.clearRect(0, 0, canvas.width, canvas.height);
                  for (i = 0; i < confettiPaperCount; i++) {
                    confettiPapers[i].Update(dt);
                    confettiPapers[i].Draw(context);
                  }
                  for (i = 0; i < confettiRibbonCount; i++) {
                    confettiRibbons[i].Update(dt);
                    confettiRibbons[i].Draw(context);
                  }
                };
              };
              var confetti = new confetti.Context("confetti");
              confetti.start();
              $(window).resize(function() {
                confetti.resize();
              });
            });
          </script>
        @endif
        @endsection
        @section('script')
            <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
            <script src="{{asset('js/game.js')}}"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        @endsection