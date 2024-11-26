const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload, InspectorControls } = wp.blockEditor;
const { IconButton, PanelBody } = wp.components;

registerBlockType('why-choose-us/why-choose-us', {
    title: 'Why Choose Us',
    icon: 'smiley',
    category: 'layout',
    attributes: {
        sectionTitle: { type: 'string', default: 'Why Choose Us' },
        sectionDescription: { type: 'string', default: '' },
        mainImage: { type: 'string', default: null },
        features: {
            type: 'array',
            default: [
                { icon: null, title: 'Fast & Free Shipping', description: '' },
                { icon: null, title: 'Easy to Shop', description: '' },
                { icon: null, title: '24/7 Support', description: '' },
                { icon: null, title: 'Hassle Free Returns', description: '' }
            ]
        }
    },
    edit: (props) => {
        const { attributes, setAttributes } = props;
        const { sectionTitle, sectionDescription, mainImage, features } = attributes;

        const onChangeFeature = (index, field, value) => {
            const newFeatures = features.slice();
            newFeatures[index][field] = value;
            setAttributes({ features: newFeatures });
        };

        return (
            <div>
                <InspectorControls>
                    <PanelBody title="Main Image">
                        <MediaUpload
                            onSelect={(media) => setAttributes({ mainImage: media.url })}
                            type="image"
                            value={mainImage}
                            render={({ open }) => (
                                <IconButton onClick={open} icon="upload" isPrimary>
                                    Choose Image
                                </IconButton>
                            )}
                        />
                    </PanelBody>
                </InspectorControls>
                <RichText
                    tagName="h2"
                    value={sectionTitle}
                    onChange={(value) => setAttributes({ sectionTitle: value })}
                    placeholder="Enter section title..."
                />
                <RichText
                    tagName="p"
                    value={sectionDescription}
                    onChange={(value) => setAttributes({ sectionDescription: value })}
                    placeholder="Enter section description..."
                />
                <div className="row my-5">
                    {features.map((feature, index) => (
                        <div className="col-6 col-md-6" key={index}>
                            <div className="feature">
                                <div className="icon">
                                    <MediaUpload
                                        onSelect={(media) => onChangeFeature(index, 'icon', media.url)}
                                        type="image"
                                        value={feature.icon}
                                        render={({ open }) => (
                                            <IconButton onClick={open} icon="upload" isPrimary>
                                                Choose Icon
                                            </IconButton>
                                        )}
                                    />
                                </div>
                                <RichText
                                    tagName="h3"
                                    value={feature.title}
                                    onChange={(value) => onChangeFeature(index, 'title', value)}
                                    placeholder="Enter feature title..."
                                />
                                <RichText
                                    tagName="p"
                                    value={feature.description}
                                    onChange={(value) => onChangeFeature(index, 'description', value)}
                                    placeholder="Enter feature description..."
                                />
                            </div>
                        </div>
                    ))}
                </div>
                {mainImage && <img src={mainImage} alt="Why Choose Us Main Image" className="img-fluid" />}
            </div>
        );
    },
    save: (props) => {
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
    }
});
