<!doctype html>
<style>
.danger{
	color:#fff!important;
	background-color:#f44336!important
	}

.success{
	color:#fff!important;background-color:#4CAF50!important
}

.warning{
	color:#fff!important;background-color:#f19c00!important
}



.submit-container {
  position: relative;
}

.submit-btn {
  width: 100px;
  color: #20BF7E;
  font-size: 20px;
  font-family: Arial;
  text-align: center;
  text-decoration: none;
  padding: 10px 20px 10px 20px;
  border: solid #20BF7E 4px;
  text-decoration: none;
  cursor: pointer;
  border-radius: 25px;
  transition: width .3s, margin .3s, background-color .3s, color .3s;
}

.submit-btn:hover {
  background-color: #20BF7E;
  color: white;
}

.submit-btn.round {
  margin-left: 50px;
  border-color: #CCCCCC;
  background: white;
  
  /*  circle should be 50px width & height */
  /* borderLeft + paddingLeft + paddingRight + borderRight  */
  /* 4 + 20 + 20 + 4 = 48 + 2 = 50 */
  width: 2px; 
  /* borderTop + paddingTop + paddingBottom + borderBottom  */
  /* 4 + 10 + 10 + 4 = 28 + 22 = 50 */
  height: 22px;
}
.submit-btn.loaded {
  color: white;
  background-color: #20BF7E;
}

.loader-svg {
  pointer-events: none;
  position: absolute;
  top: 0px;
  left: 50px;
  width: 50px; 
  height: 50px; 
  transform-origin: 25px 25px 25px;
}


</style>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<link rel="apple-touch-icon" sizes="180x180" href="/branding/fav/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/branding/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/branding/fav/favicon-16x16.png">
		<link rel="manifest" href="/branding/fav/site.webmanifest">
		<link rel="mask-icon" href="/branding/fav/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<meta property="og:title" content="OpenOunce Technologies" />
		<meta property="og:type" content="image" />
		<meta property="og:url" content="http://OpenOunce.com" />
		<meta property="og:image" content="/branding/og-home.jpg" />
		<meta property="og:description " content="The future of state approved marijuana facilities and services." />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="The future of state approved marijuana facilities and services." />
		<meta name="twitter:title" content="OpenOunce Technologies" />
		<meta name="twitter:image" content="/branding/og-home.jpg" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <title>OpenOunce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
	<body class="is-preload">
		<!-- Wrapper -->
        <div id="wrapper">

				<!-- Intro -->
					<section class="intro">
						<header>
							<h1 style="color: white;">Open Ounce</h1>
							<p>A smarter platform for state approved marijuana vendors to connect.</p>
							<ul class="actions">
								<li><a href="#first" class="arrow scrolly"><span class="label">Next</span></a></li>
							</ul>
						</header>
						
						<div class="content top" id ="app">
							<p><strong>Match your business</strong> in our state-approved database to continue. You will receive an email once your credentials have been verified.</p>
							<p v-show="loaded" class ="success">@{{success}}</p>
							<div v-show="!loaded">
							<form>
									<p v-if="errors.length > 1" class ="danger">@{{errors}}</p>
									<p v-if="warning" class ="warning">@{{warning}}</p>
								<div class="fields">
                                    <div class="field half">
											<input type="text" class="form-control" v-model="business" name="business" v-on:keyup="autoComplete" placeholder="Business Name" autocomplete="off">
											<div class="panel-footer" v-if="results.length">
													<ul class="list-group">
													 <button  type="button" class="list-group-item" v-for="result in results" @click="fillName(result.licensee_name)">
													  @{{ result.licensee_name }}
													 </button>
													</ul>
												   </div>
												 
										</div>
									<div class="field half">
                                            <input type="text" class="form-control" v-model="email"  placeholder="Email" v-on:keyup="clearInfo">
                                    </div>
                                    
                                    <div class="field">
                                            <select v-model="type" @change="clearInfoNext">
                                                    <option disabled value="">Please select a license type</option>
                                                    <option>Provisioning Center</option>
													<option>Class A Grower</option>
													<option>Class B Grower</option>
													<option>Class C Grower</option>
													<option>Processor</option>
													<option>Secure Transporter</option>
													<option>Safety Compliance Testing</option>
                                                  </select>
                            </div>
                                    
									<div class="field half">
											<input v-on:keyup="recordRecorded(record)" type="tel" pattern="[0-9]*" ref="record" v-if="type == ''" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase">
											<input v-on:keyup="recordRecorded(record)" type="text" ref="record" v-if="type == 'Class A Grower'" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase" v-mask="'GR-A-######'">
											<input v-on:keyup="recordRecorded(record)" type="tel" pattern="[0-9]*" ref="record" v-if="type == 'Class B Grower'" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase" v-mask="'GR-B-######'">
											<input v-on:keyup="recordRecorded(record)" type="tel" pattern="[0-9]*" ref="record" v-if="type == 'Class C Grower'" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase" v-mask="'GR-C-######'">
											<input v-on:keyup="recordRecorded(record)" type="tel" pattern="[0-9]*" ref="record" v-if="type == 'Provisioning Center'" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase" v-mask="'PC-######'">
											<input v-on:keyup="recordRecorded(record)" type="tel" pattern="[0-9]*" ref="record" v-if="type == 'Processor'" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase" v-mask="'PR-######'">
											<input v-on:keyup="recordRecorded(record)" type="tel" pattern="[0-9]*" ref="record" v-if="type == 'Secure Transporter'" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase" v-mask="'ST-######'">
											<input v-on:keyup="recordRecorded(record)" type="tel" pattern="[0-9]*" ref="record" v-if="type == 'Safety Compliance Testing'" class="form-control" v-model="record" placeholder="License Record Number" v-on:keyup="clearInfo" style="text-transform:uppercase" v-mask="'SC-######'">
                                    </div>
                                    <div class="field half">
                                            <input class="form-control" ref="phone" v-model="phone" placeholder="Phone" v-mask="'(###) ###-####'" type="tel" pattern="[0-9]*" v-on:keyup="clearInfo">
                                        </div>
								</div>
							</div>
								<ul class="actions">
									<!-- <li><button type="button" @click="handleSubmit" value="Verify" class="button primary" />Verify</li> -->
															<div id="submit-button" class="submit-container">
																	<div @click="handleSubmit" 
																		 ref="submit-btn"
																		 :class="buttonClass"
																		 class="button primary">
																	  <span v-show="!clicked">Submit</span>    
																	  <span v-show="loaded">✔</span>
																	</div>
																	
																	<!--  grey circle  -->
																	<svg v-if="loading" class="loader-svg">
																	  <path stroke="#CCCCCC" fill="none" stroke-width="4" d="M25,2.5A22.5,22.5 0 1 1 2.5,25A22.5,22.5 0 0 1 25,2.5"></path>
																	</svg>
																	
																	<!--  green circle  -->
																	<!--  circumference  -->
																	<!-- 3.1416 * 50 = ~157 -->
																	<svg v-if="loading" class="loader-svg">
																	  <path stroke="#20BF7E" fill="none" stroke-width="4" d="M25,2.5A22.5,22.5 0 1 1 2.5,25A22.5,22.5 0 0 1 25,2.5" stroke-dasharray="157" :stroke-dashoffset="loaderOffset"></path>
																	</svg>
																  </div>
								</ul>
							</form>
						
						</div>
					</section>

				<!-- Section -->
					<section id="first">
						<header>
							<h2>Why Us?</h2>
						</header>
						<div class="content">
							<p><strong>Marijuana is changing</strong>, here at open ounce we believe knowing which businesses are authorized to interact with marijuana and which ones aren’t is the first step in legitimizing the industry. With the rush to obtain licensing; supply lines have been disrupted, connections have been lost, and quality has been compromised. We’re here to help your business succeed.</p>
						</div>
					</section>

				<!-- Section -->
					<section>
						<header>
							<h2>What Open Ounce Provides</h2>
						</header>
						<div class="content">
							<p><strong>Our range of services</strong> have everything in an eays to use format to make your business run smoothly.</p>
							<ul class="feature-icons">
								<li class="icon fa-laptop">Easy To Use Interface</li>
								<li class="icon fa-bolt">Fast Transcations</li>
								<li class="icon fa-signal">Wide Network</li>
								<li class="icon fa-gear">Custom Settings</li>
								<li class="icon fa-map-marker">Location Based Results</li>
								<li class="icon fa-calculator">Profit Calculations</li>
							</ul>
							<p>Sign up now for the first 6 months at a heavily discounted price, no contracts so you can cancel at any time.</p>
						</div>
					</section>
				<!-- Elements -->
				<!--
					<section>
						<header>
							<h2>Elements</h2>
						</header>
						<div class="content">

							<section>
								<header>
									<h3>Text</h3>
								</header>
								<div class="content">
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<h5>Heading Level 5</h5>
									<hr />
									<h5>Blockquote</h5>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h5>Preformatted</h5>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
  print 'Iteration ' + i;
  deck.shuffle();
  i++;
}

print 'Sorted in ' + i + ' iterations.';</code></pre>
								</div>
							</section>

							<section>
								<header>
									<h3>Lists</h3>
								</header>
								<div class="content">

									<h4>Unordered</h4>
									<ul>
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Alternate</h4>
									<ul class="alt">
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Ordered</h4>
									<ol>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis viverra.</li>
										<li>Felis enim feugiat.</li>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis lorem.</li>
										<li>Felis enim et feugiat.</li>
									</ol>
									<h4>Icons</h4>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
									</ul>

									<h4>Actions</h4>
									<ul class="actions">
										<li><a href="#" class="button primary">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions stacked">
										<li><a href="#" class="button primary">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
								</div>
							</section>

							<section>
								<header>
									<h3>Table</h3>
								</header>
								<div class="content">
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</section>

							<section>
								<header>
									<h3>Buttons</h3>
								</header>
								<div class="content">
									<ul class="actions">
										<li><a href="#" class="button primary">Primary</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button large">Large</a></li>
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button primary icon fa-download">Icon</a></li>
										<li><a href="#" class="button icon fa-download">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button primary disabled">Disabled</span></li>
										<li><span class="button disabled">Disabled</span></li>
									</ul>
								</div>
							</section>

							<section>
								<header>
									<h3>Form</h3>
								</header>
								<div class="content">
									<form method="post" action="#">
										<div class="fields">
											<div class="field half">
												<label for="demo-name">Name</label>
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe" />
											</div>
											<div class="field half">
												<label for="demo-email">Email</label>
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="jane@untitled.tld" />
											</div>
											<div class="field">
												<label for="demo-category">Category</label>
												<select name="demo-category" id="demo-category">
													<option value="">-</option>
													<option value="1">Manufacturing</option>
													<option value="1">Shipping</option>
													<option value="1">Administration</option>
													<option value="1">Human Resources</option>
												</select>
											</div>
											<div class="field half">
												<input type="radio" id="demo-priority-low" name="demo-priority" checked>
												<label for="demo-priority-low">Low</label>
											</div>
											<div class="field half">
												<input type="radio" id="demo-priority-high" name="demo-priority">
												<label for="demo-priority-high">High</label>
											</div>
											<div class="field half">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="field half">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="field">
												<label for="demo-message">Message</label>
												<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Send Message" class="primary" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</form>
								</div>
							</section>

						</div>
					</section>
				--><section>
						<footer>
							<ul class="items">
								<li>
									<h3>Email</h3>
									<a href="mailto:hello@openounce.com">hello@openounce.com</a>
								</li>
								<li>
									<h3>Phone</h3>
									<a href="tel:248-890-3333">248-890-3333</a>
								</li>
								<li>
									<h3>Address</h3>
									<span>13444 Prospect Avenue, Warren MI 48324</span>
								</li>
								<li>
									<h3>Elsewhere</h3>
									<ul class="icons">
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
									</ul>
								</li>
							</ul>
						</footer>
					</section>

				<!-- Copyright -->
					<div class="copyright">&copy; Open Ounce Technologies LLC</div>

			</div>

		<!-- Scripts -->
            <script src="{{ asset('js/jquery.min.js') }}"></script>
			<script src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('js/browser.min.js') }}"></script>
			<script src="{{ asset('js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('js/util.js') }}"></script>
			<script src="{{ asset('js/main.js') }}"></script>

	</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/v-mask/dist/v-mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>
<script>
Vue.use(VueMask.VueMaskPlugin);
</script>
<script>
const circumference = 157
const app = new Vue({
  el:'#app',
  data: {
	  errors: [],
	  success: '',
	  warning: '',
      business: '',
      email: '',
      type: '',
      record: '',
	  phone: '',
	  results: [],
	  clicked: false,
	  loading: false,
	  loaded: false,
	  loaderOffset: circumference
  },  
   methods: {
    handleSubmit() {
		this.errors = "";
		this.success = "";
		this.warning= "";
		if (this.business.length < 3) {
			this.errors = "Please enter your business name.";
		} else if (this.email.length < 3) {
			this.errors = "Please enter your email.";
		} else if (this.type.length < 3) {
			this.errors = "Please select your license type.";
		} else if (this.record.length < 9) {
			this.errors = "Please enter your state licensed record. It usually looks like: Processor = PR-000000 / Grower = GR-C-000000 / Secure Transporter = ST-000000 / Safety Compliance = SC-000000 / Provisioning Center = PC-000000";
		} else if (this.phone.length < 14) {
			this.errors = "Please enter your 9 digit phone number, include your area code.";
		} else {
        axios.post('/verify', {
            business: this.business,
            email: this.email,
            type: this.type,
            record: this.record,
            phone: this.phone,
            }).then(response => {
                            
							console.log(response.data); 
							
							if  (response.data.success)
							{
								this.success = response.data.success;
								this.errors = "";
								if (this.clicked && !this.loaded)
									return
								// restart when button finished the animation
									if (this.loaded) {
										this.restart()
										return
									}
									// start loading animation 
									this.clicked = true
									// when css transition ends, execute animateLoader method
									this.$refs['submit-btn'].addEventListener("transitionend", 
										this.animateLoader, false);
							} else if (response.data.warning){
								this.warning = response.data.warning;
								this.errors = "";
							} else {
								alert("Some unkown error has occured.")
							}
                    })
                    .catch(error =>{
            			const response = error.response;
						  console.log(response.data.errors);
						  this.errors = response.data.errors;
						  this.success = "";
					});
				}

            console.log(this.business + this.email + this.type + this.record + this.phone);
	},
	autoComplete() {
		this.results = [];
		this.errors = "";
		this.success = "";
		this.warning= "";
    	if(this.business.length > 2){
		 axios.get('/api/business',{params: {name: this.business}})
		 	.then(response => {
				  this.results = response.data;
		 });
		}
	},
	fillName(licensee_name) {
		this.errors = "";
		this.success = "";
		this.business = licensee_name;
		this.results = [];
		this.warning= "";
	},
	clearInfo() {
		this.errors = "";
		this.success = "";
		this.warning= "";
	},
	clearInfoNext() {
		this.errors = "";
		this.success = "";
		this.warning= "";
		this.$refs.record.focus();
	},
	recordRecorded(record) {
		var sixDigits = /\d{6}/;
		if (sixDigits.test(record)){
		this.$refs.phone.focus();
		}
	},
    animateLoader () {
      this.loading = true
      // remove transition end event listener
      this.$refs['submit-btn'].removeEventListener("transitionend", 
        this.animateLoader, false);
      
      // animate the loaderOffset property,
      // on production this should be replaced 
      // with the real loading progress
      TweenLite.to(this, 2, {
        loaderOffset: 0,
        ease: Power4.easeInOut,
        onComplete: this.completeLoading // execute this method when animation ends
      })
    },
    completeLoading () {
      this.loading = false
      this.loaded = true
    },
    restart () {
      this.clicked = false
      this.loaded = false
      this.loaderOffset = circumference
    }
  },
  computed: {
    buttonClass () {
      if (this.loaded) {
        return 'loaded'
      }
      
      if (this.clicked) {
        return 'round'
      }
      
      return ''
    }
  }
})
</script>