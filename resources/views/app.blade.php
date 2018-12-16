<!doctype html>
<style>
.danger{
	color:#fff!important;
	background-color:#f44336!important
	}

.success{
	color:#fff!important;background-color:#4CAF50!important
}
</style>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <title>Open Ounce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
	<body class="is-preload">
		<!-- Wrapper -->
        <div id="wrapper">

				<!-- Intro -->
					<section class="intro">
						<header>
							<h1>Open Ounce</h1>
							<p>A smarter platform for state approved marijuana vendors to connect.</p>
							<ul class="actions">
								<li><a href="#first" class="arrow scrolly"><span class="label">Next</span></a></li>
							</ul>
						</header>
						<div class="content top" id ="app">
							<p><strong>Match your business</strong> in our state-approved database to continue. You will receive an email once your credentials have been verified.</p>
							<form>
									<p v-if="errors.length > 1" class ="danger">@{{errors}}</p>
									<p v-if="success" class ="success">@{{success}}</p>
								<div class="fields">
                                    <div class="field half">
                                            <input type="text" class="form-control" v-model="name" placeholder="Business Name">
                                        </div>
									<div class="field half">
                                            <input type="text" class="form-control" v-model="email"  placeholder="Email">
                                    </div>
                                    
                                    <div class="field">
                                            <select v-model="type">
                                                    <option disabled value="">Please select a license type</option>
                                                    <option>Provisioning Center</option>
                                                    <option>Grower</option>
													<option>Processor</option>
													<option>Secure Transporter</option>
													<option>Safety Compliance Testing</option>
                                                  </select>
                            </div>
                                    
									<div class="field half">
                                            <input type="text" class="form-control" v-model="record" placeholder="License Record Number">
                                    </div>
                                    <div class="field half">
                                            <input type="text" class="form-control" v-model="phone" placeholder="Phone">
                                        </div>
								</div>
								<ul class="actions">
									<li><input  @click="handleSubmit" value="Verify" class="button primary" /></li>
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
<script>
const app = new Vue({
  el:'#app',
  data: {
	  errors: [],
	  notFound: '',
	  success: '',
      name: '',
      email: '',
      type: '',
      record: '',
      phone: ''
  },

   methods: {
    handleSubmit() {
        axios.post('/verify', {
            name: this.name,
            email: this.email,
            type: this.type,
            record: this.record,
            phone: this.phone,
            }).then(response => {
                            
							console.log(response.data); 
							this.success = response.data.success;
							this.errors = "";
                    })
                    .catch(error =>{
            			const response = error.response;
						  console.log(response.data.errors);
						  this.errors = response.data.errors;
						  this.success = "";
                    });

            console.log(this.name + this.email + this.type + this.record + this.phone);
    }
  }
})
</script>