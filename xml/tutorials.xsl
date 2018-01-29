<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

  <h2>LIST OF <span style="color: yellow;">TUTORIALS</span></h2>
  <ul>
    <xsl:for-each select="tutorials/tutorial">
    	<xsl:sort select="category"/>
     	<xsl:sort select="topic"/>
    	<li>
    		<p>TOPIC: <span style="color: yellow;"><xsl:value-of select="topic"/></span></p>
        <p>CATEGORY: <span style="color: yellow;"><xsl:value-of select="category"/></span></p>
        <form action="enroll.php" method="POST">
    		  <input type="hidden" name="topic" value="{topic}"/>
    		  <input type="submit" value="E N R O L L" style="width: 150px;"/>
        </form>
    	</li>
    </xsl:for-each>
  </ul>

</xsl:template>

</xsl:stylesheet>