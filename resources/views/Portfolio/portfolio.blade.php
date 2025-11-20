@extends('Portfolio.layout.index')

@section('body')
    <header>
        <div class="hero">
            <div class="head">
                <p>I Am AJAY BHAYADYO</p>
                <h1>BSc CSIT </h1>
                <button id="but">Contact Me</button>
            </div>
            <div class="pic"></div>
        </div>
    </header>
    <!-- endofhero -->
    
    <!-- about me section -->
    <section>
        <div id="about">
            <div class="pic1"></div>
            <div class="text">
                <h2>About Me</h2>
                <pre>I am a passionate BSc CSIT student currently in 
my 7th semester. I love coding, web development,
and learning new technologies.</pre>
            </div>

        </div>
    </section>
    <!-- end of about me  -->

    <!-- myskills and education -->
    <section id="skills">
  <button id="prev">◀</button>
  <div class="skills" id="contentArea">
    <ul id="lts">
      <h2 id="text1">Skills</h2>
      <li id="text2">HTML, CSS, JavaScript</li>
      <li>PHP, MySQL</li>
      <li>Java, C++</li>
      <li>React (basic), Git</li>
    </ul>
    <img src="{{asset('images/portimage/1.png')}}" alt="skill" class="pic8" id="mainImage">
  </div>
  <button id="next">▶</button>
</section>


    <section id="projects">
        <h2>Projects</h2>
        <ul>
            <li>Hospital Management System (MERN Stack)</li>
            <li>Student Result Portal (PHP + MySQL)</li>
            <li>Portfolio Website (This one!)</li>
        </ul>
    </section>

    <section id="contact">
        <div id="contacts">
            <div class="Con1">
        <h2>Contact Us</h2>
        <pre>Realize your dream with us</pre><br>
<a href="https://github.com/headlet" id="githubs"><i class="fab fa-github gitss" ></i></a>
<a href="https://www.linkedin.com/in/ajay-bhayadyo-a17713285/"><i class="fa-brands fa-linkedin gitss"></i></a>
    </div>

    
        <form id="contactForm">
            <input type="text" placeholder="First Name" name="fname" required>
            <input type="text" placeholder="Last Name" name="sname" required>
            <input type="email" placeholder="Your Email" name="mail" required>
            <input type="tel" name="pno" id="pno" placeholder="Your Number" required>
            <textarea placeholder="Your Message" name="message" required></textarea>
            <button type="submit" id="sub">Send Message</button>
            <p id="msg"></p>
        </form>
        </div>
    </section>
    <footer>
        <p>&copy; 2025 Ajay Bhayadyo</p>
    </footer>

 

@endsection