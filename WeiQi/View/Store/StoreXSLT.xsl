<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : StoreXSLT.xsl
    Created on : 24 August 2020, 10:32 pm
    Author     : Lim Yi En
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>StoreXSLT</title>
            </head>
            <body>
                <h1>Store</h1>
        
                <xsl:for-each select="//product">
                    <h2>
                        <xsl:value-of select="name"/>
                    </h2>
                    <p>
                        id: <xsl:value-of select="@id"/>
                        <br/>
                        Desc: <xsl:value-of select="desc"/>
                        <br/>
                        Quantity: <xsl:value-of select="quantity"/>
                        <br/>
                        Price: <xsl:value-of select="price"/>
                        <br/>
                        Discount Rate: <xsl:value-of select="discountRate"/>
                        <br/>
                    </p>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
