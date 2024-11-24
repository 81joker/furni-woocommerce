const Save = (props) => {
    const { attributes: { sectionTitle, sectionDescription, mainImage, features } } = props;

    return (
        <div className="why-choose-section">
            <div className="container">
                <div className="row justify-content-between align-items-center">
                    <div className="col-lg-6">
                        <h2 className="section-title">{sectionTitle}</h2>
                        <p>{sectionDescription}</p>

                        <div className="row my-5">
                            {features.map((feature, index) => (
                                <div className="col-6 col-md-6" key={index}>
                                    <div className="feature">
                                        <div className="icon">
                                            {feature.icon && <img src={feature.icon} alt="Feature Icon" className="imf-fluid" />}
                                        </div>
                                        <h3>{feature.title}</h3>
                                        <p>{feature.description}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>

                    <div className="col-lg-5">
                        <div className="img-wrap">
                            {mainImage && <img src={mainImage} alt="Why Choose Us Main Image" className="img-fluid" />}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Save;
