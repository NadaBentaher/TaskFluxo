<?= $this->extend('layout/home-layout') ?>
<?= $this->section('content') ?>

<style>
    .about-section {
        background: #f9f9f9;
        padding: 50px 0;
    }
    .about-section h2 {
        text-align: center;
        margin-bottom: 40px;
        font-size: 2.5em;
        color: #333;
    }
    .about-section .content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .about-section .content .box {
        flex: 0 0 45%;
        margin: 20px 0;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .about-section .content .box h3 {
        margin-bottom: 15px;
        font-size: 1.8em;
        color: #333;
    }
    .about-section .content .box p, .about-section .content .box ul {
        font-size: 1.1em;
        color: #555;
    }
    .about-section .content .box ul {
        list-style: none;
        padding: 0;
    }
    .about-section .content .box ul li {
        margin-bottom: 10px;
    }
    .about-section .content .box i {
        font-size: 1.5em;
        color: #F1C40F;
        margin-right: 10px;
    }
    .about-section .team {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .about-section .team .card {
        flex: 0 0 30%;
        margin: 20px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .about-section .team .card img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        border: 4px solid #f1c40f;
        margin-bottom: 15px;
    }
    .about-section .team .card h4 {
        margin-top: 10px;
        font-size: 1.5em;
    }
    .about-section .team .card p {
        color: #777;
        font-size: 1.1em;
    }
    .values-section, .process-section, .partners-section, .contact-section {
    
    padding: 50px 0;
    margin-bottom: 20px;
}

.values-section .content, .process-section .steps, .partners-section .partners {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.values-section .box, .process-section .step, .partners-section .partner, .contact-section ul {
    flex: 0 0 30%;
    margin: 10px;
    padding: 20px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
}

.values-section .box i, .process-section .step i {
    font-size: 2em;
    color: #F1C40F;
    margin-bottom: 15px;
}

.partners-section .partner img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.contact-section ul {
    list-style: none;
    padding: 0;
}

.contact-section ul li {
    margin-bottom: 10px;
    font-size: 1.2em;
}

.contact-section ul li i {
    margin-right: 10px;
    color: #F1C40F;
}

</style>

<div class="about-section">
    <div class="container">
        <h2>About Us</h2>
        <div class="content">
            <div class="box">
                <h3><i class="fas fa-bullhorn"></i> Our Mission</h3>
                <p>We strive to deliver the best task management solutions to help teams and individuals stay organized and productive.</p>
            </div>
            <div class="box">
                <h3><i class="fas fa-history"></i> Our History</h3>
                <p>Founded in 2023, our company has grown from a small startup to a leading provider of task management software.</p>
            </div>
        </div>
        <div class="content">
            <div class="box">
                <h3><i class="fas fa-trophy"></i> Achievements</h3>
                <ul>
                    <li>Winner of the Best Startup Award 2023</li>
                    <li>Over 10,000 active users worldwide</li>
                </ul>
            </div>
            <div class="box">
                <h3><i class="fas fa-quote-right"></i> Testimonials</h3>
                <p>"This tool has revolutionized the way we manage tasks. Highly recommend!" - Jane Doe, CEO of ABC Corp.</p>
            </div>
        </div>
        <h2>Meet Our Team</h2>
        <div class="team">
            <div class="card">
                <img src="<?= base_url('public/images/ceo.jpg') ?>" alt="John Doe">
                <h4>John Doe</h4>
                <p>CEO & Founder</p>
            </div>
            <div class="card">
                <img src="<?= base_url('public/images/employee.png') ?>" alt="Jane Smith">
                <h4>Jane Smith</h4>
                <p>CTO</p>
            </div>
            
        </div>
        <div class="process-section">
    <h2>Our Process</h2>
    <div class="container">
        <div class="steps">
            <div class="step">
                <i class="fas fa-search"></i>
                <h3>Discovery</h3>
                <p>We start by understanding your needs and goals.</p>
            </div>
            <div class="step">
                <i class="fas fa-cogs"></i>
                <h3>Planning</h3>
                <p>We create a tailored plan to achieve your objectives.</p>
            </div>
            <div class="step">
                <i class="fas fa-check-circle"></i>
                <h3>Execution</h3>
                <p>We implement the plan with precision and dedication.</p>
            </div>
            <div class="step">
                <i class="fas fa-chart-line"></i>
                <h3>Evaluation</h3>
                <p>We measure results and refine our approach for continuous improvement.</p>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<?= $this->endSection(); ?>
